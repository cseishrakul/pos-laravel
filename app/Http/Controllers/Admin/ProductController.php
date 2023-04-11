<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use DB;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addProduct(){
        $category = Category::all();
        $supplier = Supplier::all();
        return view('admin.product.product.add_product',compact('category','supplier'));
    }

    public function insertProduct(Request $request){
        $data = new Product;
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image = $request->file('product_image');
        if($image){
            $image_name = $request->product_code;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image'] = $image_url;
                $product = Product::insert($data);
                if($product){
                    $notification = array('message' => 'Product Uploaded Successfully!','alert-type' => 'success');
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array('error' => 'Opps something went wrong!','alert-type' => 'error');
                    return redirect()->back()->with($notification);
                }
            }else{
                return redirect()->back();
            }
        }
    }

    public function allProduct(){
        $product = Product::all();
        return view('admin.product.product.all_product',compact('product'));
    }

    public function deleteProduct($id){
        $product = Product::findorfail($id);
        $delete = $product->delete();
        if($delete){
            $notification = array('message' => 'Product Deleted Successfully!','alert-type' => 'success');
            return redirect()->route('all.product')->with($notification);
        }else{
            $notification = array('error' => 'Opps something went wrong','alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function viewProduct($id){
        $product = DB::table('products')->join('categories','products.cat_id','categories.id')->join('suppliers','products.sup_id','suppliers.id')
        ->select('categories.cat_name','products.*','suppliers.name')
        ->where('products.id',$id)
        ->first();
        return view('admin.product.product.view_product',compact('product'));
    }

    public function editProduct($id){
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::findorfail($id);
        return view('admin.product.product.edit',compact('product','category','supplier'));
    }

    public function updateProduct(Request $request, $id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->product_image;

        if($image){
            $image_name = $request->product_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image'] = $image_url;
                $img = DB::table('products')->where('id',$id)->first();
                $image_path = $img->product_image;
                $done = unlink($image_path);
                $post = DB::table('products')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.product')->with($notification);
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
                $data['product_image'] = $oldPhoto;
                $post = DB::table('products')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->route('all.product')->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }
        }
    }


    // Product Import Export Excel
    public function importProduct(){
        return view('admin.product.product.import_product');
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request) 
    {
       $excel = Excel::import(new ProductsImport, $request->file('import_file'));
        
        if($excel){
            $notification = array('message' => 'Product Imported!','alert-type' => 'success');

            return redirect()->route('all.product')->with($notification);
        }else{
            $notification = array('error' => 'Opps! something went wrong','alert-type' => 'error');

            return redirect()->route('all.product')->with($notification);
        }
    }
}
