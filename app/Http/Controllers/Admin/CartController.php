<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\setting;
use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;

        $add = Cart::add($data);
        if ($add) {
            $notification = array('message' => 'Cart Added Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('error' => 'Opps! somthing went wrong', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function updateCart(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);
        if ($update) {
            $notification = array('message' => 'Cart Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('error' => 'Opps! somthing went wrong', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function removeCart($rowId)
    {
        $remove = Cart::remove($rowId);
        if ($remove) {
            $notification = array('message' => 'Cart Removed Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('error' => 'Opps! somthing went wrong', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    public function createInvoice(Request $request)
    {
        $request->validate(
            [
                'cus_id' => 'required'
            ],
            [
                'cus_id.required' => 'Select A Customer First!',
            ]
        );
        $cus_id = $request->cus_id;
        $customer = Customer::where('id', $cus_id)->first();
        $contents = Cart::content();
        $setting = DB::table('settings')->first();
        return view('admin.invoice.invoice', compact('customer', 'contents', 'setting'));
    }

    public function finalInvoice(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = Order::insertGetId($data);
        $contents = Cart::content();

        $odata = array();
        foreach($contents as $cart){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $cart->id;
            $odata['quantity'] = $cart->qty;
            $odata['unitcost'] = $cart->price;
            $odata['total'] = $cart->total;

            $insert = Orderdetail::insert($odata);
        }

        if($insert){
            $notification = array('message' => 'Successfully Invoice Created | Please Deliver The Product and Accept Status', 'alert-type' => 'success');
            Cart::destroy();
            return redirect()->route('admin.dashboard')->with($notification);
        }else{
            $notification = array('error' => 'Oops!somthing wrong', 'alert-type' => 'error');
            Cart::destroy();
            return redirect()->route('admin.dashboard')->with($notification);
        }
        
    }
}
