<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {   
        $product = Product::join('categories','products.cat_id','categories.id')->select('categories.cat_name','products.*')->get();
        $customer = Customer::get();
        $category = Category::get();
        return view('admin.pos.pos',compact('product','customer','category'));
    }


    public function pendingOrder(){
        $pending = Order::join('customers','orders.customer_id','customers.id')->select('customers.name','orders.*')->where('order_status','pending')->get();

        return view('admin.order.pending_order',compact('pending'));
    }

    public function viewOrderStatus($id){
        $order = DB::table('orders')->join('customers','orders.customer_id','customers.id')->select('customers.*','orders.*')->where('orders.id',$id)->first();
        $order_details = DB::table('orderdetails')->join('products','orderdetails.product_id','products.id')->select('orderdetails.*','products.product_name','products.product_code')->where('order_id',$id)->get();


        $setting = DB::table('settings')->first();
        return view('admin.order.order_confirmation',compact('order','order_details','setting'));
    }

    public function posDone($id){
        $approved = DB::table('orders')->where('id',$id)->update(['order_status' => 'success']);

        if($approved){
            $notification = array('message' => 'Order Approved Successfully!','alert-type' => 'success');
            return redirect()->route('pending.order')->with($notification);
        }else{
            $notification = array('error' => 'Oops!Something went wrong','alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function successOrder(){
        $success = DB::table('orders')->join('customers','orders.customer_id','customers.id')->select('customers.name','orders.*')->where('order_status','success')->get();

        return view('admin.order.success_order',compact('success'));
    }
}
