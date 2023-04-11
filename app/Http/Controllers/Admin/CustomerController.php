<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addCustomer(){
        return view('admin.customer.add_customer');
    }

    public function store(Request $request){
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'address' => 'required',
            'phone' => 'required|unique:customers|max:13',
            'photo' => 'required',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['shopname'] = $request->shopname;
        $data['address'] = $request->address;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        $image = $request->file('photo');
        if($image){
            $image_name = $request->phone;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/customers/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $customer = DB::table('customers')->insert($data);
                if($customer){
                    $notification = array('message' => 'Customer Added Successfully!','alert-type' => 'success');
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array('message' => 'Getting error!','alert-type' => 'danger');
                    return redirect()->back()->with($notification);
                }
            }else{
                return redirect()->back();
            }
        }
    }

    public function allCustomer(){
        $customer = Customer::all();
        return view('admin.customer.all_customer',compact('customer'));
    }
    public function viewCustomer($id){
        $customer = Customer::findorfail($id);
        return view('admin.customer.view',compact('customer'));
    }

    public function editCustomer($id){
        $customer = Customer::findorfail($id);
        return view('admin.customer.edit',compact('customer'));
    }

    public function updateCustomer(Request $request, $id){
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'address' => 'required',
            'phone' => 'required|unique:customers|max:13',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['shopname'] = $request->shopname;
        $data['address'] = $request->address;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $image = $request->photo;

        if($image){
            $image_name = $request->phone;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/customers/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $img = DB::table('customers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $post = DB::table('customers')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.customer')->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }else{
                return redirect()->back();
            }
        }else{
            $oldPhoto = $request->old_photo;
            if($oldPhoto){
                $data['photo'] = $oldPhoto;
                $post = DB::table('customers')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.customer')->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }
        }
    }

    public function delete($id){
        $customer = Customer::findorfail($id);
        $photo = $customer->photo;
        unlink($photo);
        $delete = $customer->delete();
        if($delete){
            $notification = array('message' => 'Customer deleted successfully!','alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = array('message' => 'Error While Deleting','alert-type' => 'danger');
            return redirect()->back()->with($notification);
        }
    }
}
