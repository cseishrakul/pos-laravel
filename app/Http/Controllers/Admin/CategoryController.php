<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addCategory(){
        return view('admin.product.category.add_category');
    }

    public function insertCategory(Request $reqeust){
        $category = new Category;
        $category['cat_name'] = $reqeust->cat_name;
        $category->save();
        if($category){
            $notification = array(
                'message' => 'Category Inserted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'error' => 'Oops something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allCategory(){
        $category = Category::all();
        return view('admin.product.category.all_category',compact('category'));
    }

    public function editCategory($id){
        $category = Category::findorfail($id);
        return view('admin.product.category.edit',compact('category'));
    }

    public function updateCategory(Request $reqeust, $id){
        $category = Category::find($id);
        $category['cat_name'] = $reqeust->cat_name;
        $category->update();
        if($category){
            $notification = array(
                'message' => 'Category Updated!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'error' => 'Oops something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteCategory($id){
        $category = Category::findorfail($id);
        $delete = $category->delete();
        if($delete){
            $notification = array('message' => 'Category Deleted Successfully!','alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = array('error' => 'Opps something went wrong','alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
