<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = Order::first();
        $setting = DB::table('settings')->first();
        $pdf = PDF::loadView('admin.pdf.invoice', compact('data'));

        return $pdf->download('pos.pdf');
    }

    public function orderPrint($id)
    {   
        $order = DB::table('orders')->join('customers','orders.customer_id','customers.id')->select('customers.*','orders.*')->where('orders.id',$id)->first();

        $order_details = DB::table('orderdetails')->join('products','orderdetails.product_id','products.id')->select('orderdetails.*','products.product_name','products.product_code')->where('order_id',$id)->get();

        $setting = DB::table('settings')->first();
        $pdf = PDF::loadview('admin.pdf.order', compact('order','setting','order_details'));
        return $pdf->download('order_details.pdf');
    }
}
