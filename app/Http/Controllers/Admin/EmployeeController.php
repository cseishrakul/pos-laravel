<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.employee.add_employee');
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'photo' => 'required',
            'salary' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if($image){
            $image_name = $request->email;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $employee = DB::table('employees')
                        ->insert($data);
                    if($employee){
                        $notification = array('message' => 'Successfully Inserted','alert-type' => 'success');
                        return redirect()->back()->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Inserting','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function allEmployee()
    {
        $employee = Employee::all();
        return view('admin.employee.all_employee', compact('employee'));
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $photo = $employee->photo;
        unlink($photo);
        $delete = $employee->delete();
        if ($delete) {
            $notification = array('message' => 'Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }
    }

    public function viewEmployee($id)
    {
        $single = Employee::findorfail($id);
        return view('admin.employee.view', compact('single'));
    }

    public function editEmployee($id){
        $employee = Employee::findorfail($id);
        return view('admin.employee.edit',compact('employee'));
    }

    public function updateEmployee(Request $request,$id){
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['nid_no'] = $request->nid_no;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->photo;

        if($image){
            $image_name = $request->email;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo'] = $image_url;
                $img = DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;
                $done = unlink($image_path);
                $post = DB::table('employees')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.employee')->with($notification);
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
                $post = DB::table('employees')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.employee')->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }
        }
    }
}
