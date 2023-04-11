<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addSuppiler(){
        return view('admin.supplier.add_supplier');
    }

    public function store(Request $request){
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'address' => 'required',
            'phone' => 'required|unique:suppliers|max:13',
            'photo' => 'required',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
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
            $upload_path = 'images/suppliers/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $customer = DB::table('suppliers')->insert($data);
                if($customer){
                    $notification = array('message' => 'Supplier Added Successfully!','alert-type' => 'success');
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

    public function allSupplier(){
        $supplier = Supplier::all();
        return view('admin.supplier.all_supplier',compact('supplier'));
    }

    public function viewSupplier($id){
        $supplier = Supplier::findorfail($id);
        return view('admin.supplier.view',compact('supplier'));
    }

    public function editSupplier($id){
        $supplier = Supplier::findorfail($id);
        return view('admin.supplier.edit',compact('supplier'));
    }

    public function updateSupplier(Request $request, $id){
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['type'] = $request->type;
        $data['shop'] = $request->shop;
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
            $upload_path = 'images/suppliers/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $img = DB::table('suppliers')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $post = DB::table('suppliers')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.supplier')->with($notification);
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
                $post = DB::table('suppliers')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.supplier')->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }
        }
    }

    public function deleteSupplier($id){
        $supplier = Supplier::find($id);
        $photo = $supplier->photo;
        unlink($photo);
        $delete = $supplier->delete();
        if ($delete) {
            $notification = array('message' => 'Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
