<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index(){
        $products = Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }

    public function AddProduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_category_id' => 'required',
            'product_sub_category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/'), $image_name);
        $image_url = 'upload/' . $image_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_sub_category_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('sub_category_name');

        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_category_id' => $category_id,
            'product_category_name' => $category_name,
            'product_sub_category_id' => $subcategory_id,
            'product_sub_category_name' => $subcategory_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_img' => $image_url,
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproduct')->with('message', "Product Added Successfully!");
    }

    public function EditProductImg($id){
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productinfo'));
    }
    public function UpdateProductImg(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->id;
        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/'), $image_name);
        $image_url = 'upload/' . $image_name;

        Product::findOrFail($id)->update([
            'product_img' => $image_url,
        ]);
        return redirect()->route('allproduct')->with('message', "Product Image Updated Successfully!");
    }
    public function EditProduct($id){
        $productinfo = Product::findOrFail($id);
        return view('admin.editproduct', compact('productinfo'));
        
    }
    public function UpdateProduct(Request $request){
        
        $id = $request->id;

        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            
        ]);
        Product::findOrFail($id)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
        ]);
        return redirect()->route('allproduct')->with('message', "Product Updated Successfully!");
             
}
       public function DeleteProduct($id){
        $cat_id = Product::where('id',$id)->value('product_category_id');
        $subcat_id = Product::where('id',$id)->value('product_sub_category_id');    

        $product = Product::findOrFail($id)->delete();
    
       Category::where('id',$cat_id)->decrement('product_count',1);
     SubCategory::where('id',$subcat_id)->decrement('product_count',1);

     return redirect()->route('allproduct')->with ('message',"Product Deleted Successfully!");

       }
      
}