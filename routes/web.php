<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttendenceController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Admin Route
Route::prefix('admin')->group(function(){
    Route::get('/login',[adminController::class,'index'])->name('admin_login');
    Route::post('/login/owner',[adminController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[adminController::class,'dashboard'])->middleware(['admin'])->name('admin.dashboard');

    Route::get('/logout',[adminController::class,'logout'])->name('admin_logout')->middleware('admin');

    Route::get('register',[adminController::class,'register'])->name('admin.register');
    Route::post('/upload',[adminController::class,'registration'])->name('register.upload');

    // Employee Routes
    Route::get('/add-employee',[EmployeeController::class,'index'])->name('add.employee');
    Route::post('/insert-employee',[EmployeeController::class,'store'])->name('insert.employee');
    Route::get('/all-employee',[EmployeeController::class,'allEmployee'])->name('all.employee');
    Route::get('delete-employee/{id}',[EmployeeController::class,'delete'])->name('delete-employee');
    Route::get('/view-employee/{id}',[EmployeeController::class,'viewEmployee'])->name('view-employee');
    Route::get('/edit-employee/{id}',[EmployeeController::class,'editEmployee'])->name('edit-employee');
    Route::post('/update-employee/{id}',[EmployeeController::class,'updateEmployee'])->name('update.employee');
    


    // Customer Routes
    Route::get('/add-customer',[CustomerController::class,'addCustomer'])->name('add.customer');
    Route::post('/insert-customer',[CustomerController::class,'store'])->name('insert.customer');
    Route::get('/all-customer',[CustomerController::class,'allCustomer'])->name('all.customer');
    Route::get('/view-customer/{id}',[CustomerController::class,'viewCustomer'])->name('view-customer');
    Route::get('/edit-customer/{id}',[CustomerController::class,'editCustomer'])->name('edit-customer');
    Route::post('/update-customer/{id}',[CustomerController::class,'updateCustomer'])->name('update.customer');
    Route::get('delete-customer/{id}',[CustomerController::class,'delete'])->name('delete-customer');

    // Supplier Routes
    Route::get('/add-supplier',[SupplierController::class,'addSuppiler'])->name('add.supplier');
    Route::post('/insert-supplier',[SupplierController::class,'store'])->name('insert.supplier');
    Route::get('/all-supplier',[SupplierController::class,'allSupplier'])->name('all.supplier');
    Route::get('/view-supplier/{id}',[SupplierController::class,'viewSupplier'])->name('view-supplier');
    Route::get('/edit-supplier/{id}',[SupplierController::class,'editSupplier'])->name('edit-supplier');
    Route::post('/update.suppllier/{id}',[SupplierController::class,'updateSupplier'])->name('update.suppllier');
    Route::get('/delete-supplier/{id}',[SupplierController::class,'deleteSupplier'])->name('delete-supplier');


    // Salary Route
    Route::get('/advance-salary',[SalaryController::class,'advanceSalary'])->name('advance.salary');
    Route::post('/insert-advance-salary',[SalaryController::class,'insertAdvanceSalary'])->name('insert.advance.salary');
    Route::get('/all-advance-salary',[SalaryController::class,'AllAdvanceSalary'])->name('all.advance.salary');
    Route::get('/pay-salary',[SalaryController::class,'paySalary'])->name('pay.salary');


    // Category for products
    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::post('/insert-category',[CategoryController::class,'insertCategory'])->name('insert.category');
    Route::get('/all-category',[CategoryController::class,'allCategory'])->name('all.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit-category');
    Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');


    // Product Routes
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/all-product',[ProductController::class,'allProduct'])->name('all.product');
    Route::post('/insert-product',[ProductController::class,'insertProduct'])->name('insert.product');
    Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('delete-product');
    Route::get('/view-product/{id}',[ProductController::class,'viewProduct'])->name('view-product');
    Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('update.product');

    // Excel Import Export Product
    Route::get('/import-product',[ProductController::class,'importProduct'])->name('import.product');
    Route::post('/import',[ProductController::class,'import'])->name('import');
    Route::get('/export',[ProductController::class,'export'])->name('export');


    // Expense Routes
    Route::get('/add-expense',[ExpenseController::class,'addExpense'])->name('add.expense');
    Route::post('/insert-expense',[ExpenseController::class,'insertExpense'])->name('insert.expense');
    Route::get('/today-expense',[ExpenseController::class,'todayExpense'])->name('today.expense');
    Route::get('/edit-today-expense/{id}',[ExpenseController::class,'editTodayExpense'])->name('edit-today-expense');
    Route::post('/update-today-expense/{id}',[ExpenseController::class,'updateTodayExpense'])->name('update.today.expense');
    Route::get('/monthly-expense',[ExpenseController::class,'monthlyExpense'])->name('monthly.expense');
    Route::get('/yearly-expense',[ExpenseController::class,'yearlyExpense'])->name('yearly.expense');

    // Month Wise Expense Route

    Route::get('/other-month-expense',[ExpenseController::class,'otherMonthExpense'])->name('other.month.expense');

    Route::get('/january-expense',[ExpenseController::class,'januaryExpense'])->name('january.expense');
    Route::get('/february-expense',[ExpenseController::class,'februaryExpense'])->name('february.expense');
    Route::get('/march-expense',[ExpenseController::class,'marchExpense'])->name('march.expense');
    Route::get('/april-expense',[ExpenseController::class,'aprilExpense'])->name('april.expense');
    Route::get('/may-expense',[ExpenseController::class,'mayExpense'])->name('may.expense');
    Route::get('/june-expense',[ExpenseController::class,'juneExpense'])->name('june.expense');
    Route::get('/july-expense',[ExpenseController::class,'julyExpense'])->name('july.expense');
    Route::get('/august-expense',[ExpenseController::class,'augustExpense'])->name('august.expense');
    Route::get('/september-expense',[ExpenseController::class,'septemberExpense'])->name('september.expense');
    Route::get('/october-expense',[ExpenseController::class,'octoberExpense'])->name('october.expense');
    Route::get('/november-expense',[ExpenseController::class,'novemberExpense'])->name('november.expense');
    Route::get('/december-expense',[ExpenseController::class,'decemberExpense'])->name('december.expense');


    // Attendence
    Route::get('/take-attendence',[AttendenceController::class,'takeAttendence'])->name('take.attendence');
    Route::post('/insert-attendence',[AttendenceController::class,'insertAttendence'])->name('insert-attendence');
    Route::get('/all-attendence',[AttendenceController::class,'allAttendence'])->name('all.attendence');
    Route::get('/edit-attendence/{edit_date}',[AttendenceController::class,'editAttendence'])->name('edit-attendence');
    Route::post('/update-attendence',[AttendenceController::class,'updateAttendence'])->name('update-attendence');
    Route::get('/view-/{edit_date}',[AttendenceController::class,'viewAttendence'])->name('view.attendence');

    // Monthly Attendence
    Route::get('/monthly-attendence',[AttendenceController::class,'monthlyAttendence'])->name('monthly.attendence');

    Route::get('/other-month-attendence',[AttendenceController::class,'otherMonthAttendence'])->name('other-month-attendence');

    Route::get('/january-attendence',[AttendenceController::class,'januaryAttendence'])->name('january.attendence');
    Route::get('/february-attendence',[AttendenceController::class,'februaryAttendence'])->name('february.attendence');
    Route::get('/march-attendence',[AttendenceController::class,'marchAttendence'])->name('march.attendence');
    Route::get('/april-attendence',[AttendenceController::class,'aprilAttendence'])->name('april.attendence');
    Route::get('/may-attendence',[AttendenceController::class,'mayAttendence'])->name('may.attendence');
    Route::get('/june-attendence',[AttendenceController::class,'juneAttendence'])->name('june.attendence');
    Route::get('/july-attendence',[AttendenceController::class,'julyAttendence'])->name('july.attendence');
    Route::get('/august-attendence',[AttendenceController::class,'augustAttendence'])->name('august.attendence');
    Route::get('/september-attendence',[AttendenceController::class,'septemberAttendence'])->name('september.attendence');
    Route::get('/october-attendence',[AttendenceController::class,'octoberAttendence'])->name('october.attendence');
    Route::get('/november-attendence',[AttendenceController::class,'novemberAttendence'])->name('november.attendence');
    Route::get('/december-attendence',[AttendenceController::class,'decemberAttendence'])->name('december.attendence');

    // Yearly Attendence
    Route::get('/yearly-attendence',[AttendenceController::class,'yearlyAttendence'])->name('yearly.attendence');


    // Webiste Setting
    Route::get('/settings',[SettingController::class,'websiteSetting'])->name('settings');
    Route::post('/update-setting/{id}',[SettingController::class,'updateSetting'])->name('update.setting');


    // POS
    Route::get('/pos',[PosController::class,'index'])->name('pos');


    // Cart
    Route::post('/add-cart',[CartController::class,'index'])->name('add.cart');
    Route::post('/update-cart/{rowId}',[CartController::class,'updateCart'])->name('cart.update');
    Route::get('/remove-cart/{rowId}',[CartController::class,'removeCart'])->name('cart.remove');


    // Invoice
    Route::post('/create-invoice',[CartController::class,'createInvoice'])->name('create.invoice');
    Route::post('/final-invoice',[CartController::class,'finalInvoice'])->name('final.invoice');


    // Order
    Route::get('/pending-order',[PosController::class,'pendingOrder'])->name('pending.order');
    Route::get('/view-order-status/{id}',[PosController::class,'viewOrderStatus'])->name('view-order-status');
    Route::get('/pos-done/{id}',[PosController::class,'posDone'])->name('pos-done');
    Route::get('/success-order',[PosController::class,'successOrder'])->name('success.order');

    // PDF Download
    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('download-pdf');
    Route::get('/print-order/{id}', [PDFController::class, 'orderPrint'])->name('print-order');
});
// End Admin Route


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
