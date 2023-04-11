<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use DB;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function advanceSalary()
    {
        $employee = Employee::all();
        return view('admin.employee.salary.advance_salary', compact('employee'));
    }

    public function insertAdvanceSalary(Request $request)
    {
        $month = $request->month;
        $emp_id = $request->emp_id;
        $advanced = DB::table('advanced_salaries')->where('month', $month)->where('emp_id', $emp_id)->first();
        if ($advanced === NULL) {
            $data = array();
            $data['emp_id'] = $request->emp_id;
            $data['month'] = $request->month;
            $data['advanced_salary'] = $request->advanced_salary;
            $data['year'] = $request->year;

            $advance = DB::table('advanced_salaries')->insert($data);
            if ($advance) {
                $notification = array('message' => 'Advanced Salary Payed!', 'alert-type' => 'success');

                return redirect()->route('all.advance.salary')->with($notification);
            } else {
                $notification = array('error' => 'Advanced Salary Not Paid!', 'alert-type' => 'error');

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array('error' => 'Oops sorry ! Already Advance Salary Paid For This Month', 'alert-type' => 'error');

            return redirect()->back()->with($notification);
        }
    }

    public function AllAdvanceSalary()
    {
        $salary = DB::table('advanced_salaries')
            ->join('employees', 'advanced_salaries.emp_id', 'employees.id')
            ->select('advanced_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.employee.salary.all_advance_salary',compact('salary'));
    }

    public function paySalary(){
        $employee = Employee::all();
        return view('admin.employee.salary.pay_salary',compact('employee'));
    }
}
