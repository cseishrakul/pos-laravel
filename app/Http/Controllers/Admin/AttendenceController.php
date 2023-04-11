<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;

class AttendenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function takeAttendence()
    {
        $employee = Employee::all();
        return view('admin.employee.attendence.take_attendence', compact('employee'));
    }

    public function insertAttendence(Request $request)
    {
        $date = $request->att_date;
        $att_date = Attendence::where('att_date', $date)->first();
        if ($att_date) {
            $notification = array('error' => 'Today Attendence Already Taken!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
        } else {
            foreach ($request->user_id as $id) {
                $data[] = [
                    'user_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'att_date' => $request->att_date,
                    'att_year' => $request->att_year,
                    'month' => $request->month,
                    'edit_date' => date('d_m_y')
                ];
            }

            $attendence = Attendence::insert($data);

            if ($attendence) {
                $notification = array('message' => 'Attendence Taking Successful!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            } else {
                $notification = array('error' => 'Opps something went wrong!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }
    }

    public function allAttendence(){
        $all_att = Attendence::select('edit_date')->groupBy('edit_date')->get();
        return view('admin.employee.attendence.all_attendence',compact('all_att'));
    }

    public function editAttendence($edit_date){
        $date = Attendence::where('edit_date',$edit_date)->first();
        $attendence = DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('admin.employee.attendence.edit_attendence',compact('attendence','date'));
    }

    public function updateAttendence(Request $request){
        foreach($request->id as $id){
            $data = [
                'attendence' => $request->attendence[$id],
                'att_date' => $request->att_date,
                'att_year' => $request->att_year,
                'month' => $request->month
            ];
            
            $attendence = Attendence::where(['att_date' => $request->att_date,'id' => $id])->first();
            $attendence->update($data);
            if($attendence){
                $notification = array('message' => 'Attendence Updated Successfully!','alert-type' => 'success');

                return redirect()->route('all.attendence')->with($notification);
            }else{
                $notification = array('error' => 'Oops something went wrong!','alert-type' => 'error');

                return redirect()->back()->with($notification);
            }
        }
    }

    public function viewAttendence($edit_date){
        $date = Attendence::where('edit_date',$edit_date)->first();
        $data = Attendence::join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();

        return view('admin.employee.attendence.view',compact('date','data'));
    }

    public function monthlyAttendence(){
        $month = date("F");
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.monthly_attendence',compact('attendence','month'));
    }

    public function otherMonthAttendence(){
        $attendence = Attendence::all();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence'));
    }

    public function januaryAttendence(){
        $month = "January";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function februaryAttendence(){
        $month = "February";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function marchAttendence(){
        $month = "March";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function aprilAttendence(){
        $month = "April";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function mayAttendence(){
        $month = "May";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function juneAttendence(){
        $month = "June";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function julyAttendence(){
        $month = "July";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function augustAttendence(){
        $month = "August";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function septemberAttendence(){
        $month = "September";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function octoberAttendence(){
        $month = "October";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function novemberAttendence(){
        $month = "November";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }
    public function decemberAttendence(){
        $month = "December";
        $attendence = Attendence::where('month',$month)->get();
        return view('admin.employee.attendence.monthly.all_month',compact('attendence','month'));
    }

    public function yearlyAttendence(){
        $year = date("Y");
        $attendence = Attendence::where('year',$year)->get();
        return view('admin.employee.attendence.yearly.yearly_attendence',compact('attendence','year'));
    }
}
