<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addExpense(){
        return view('admin.expense.add_expense');
    }

    public function insertExpense(Request $request){
        $data = new Expense();
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;

        $expense = Expense::insert($data);
        if($expense){
            $notification = array(
                'message' => 'Expense Added Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'error' => 'Opps something went wrong!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function todayExpense(){
        $date = date("d-m-y");
        $today = Expense::where('date',$date)->get();
        $daily_expense = Expense::where('date',$date)->sum('amount');
        return view('admin.expense.today_expense',compact('today','daily_expense'));
    }

    public function editTodayExpense($id){
        $data = Expense::findorfail($id);
        return view('admin.expense.edit',compact('data'));
    }

    public function updateTodayExpense(Request $request, $id){
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;

        $expense = Expense::where('id',$id)->update($data);
        if($expense){
            $notification = array(
                'message' => 'Today Expense Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('today.expense')->with($notification);
        }else{
            $notification = array(
                'error' => 'Opps something went wrong!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function monthlyExpense(){
        $month = date("F");
        $expense = Expense::where('month',$month)->get();
        return view('admin.expense.monthly_expense',compact('expense',));
    }

    public function yearlyExpense(){
        $year = date("Y");
        $expense = Expense::where('year',$year)->get();
        $yearly_expense = Expense::where('year',$year)->sum('amount');
        return view('admin.expense.yearly_expense',compact('expense','yearly_expense','year'));
    }

    // Month Wise Expenses

    public function otherMonthExpense(){
        $expense = Expense::all();
        return view('admin.expense.per_month.all_month',compact('expense'));
    }

    public function januaryExpense(){
        $months = "January";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function februaryExpense(){
        $months = "February";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function marchExpense(){
        $months = "March";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function aprilExpense(){
        $months = "April";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function mayExpense(){
        $months = "May";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function juneExpense(){
        $months = "June";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function julyExpense(){
        $months = "July";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function augustExpense(){
        $months = "August";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function septemberExpense(){
        $months = "September";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function octoberExpense(){
        $months = "October";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function novemberExpense(){
        $months = "November";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
    public function decemberExpense(){
        $months = "December";
        $expense = Expense::where('month',$months)->get();
        return view('admin.expense.per_month.monthly_expense',compact('expense'));
    }
}
