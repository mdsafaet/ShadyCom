<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        $allsubcategories = Subcategory::latest()->get();
        return view ('admin.allsubcategory',compact('allsubcategories'));

    }

    public function AddSubCategory(){
        $categories = Category::latest()->get();

        return view ('admin.addsubcategory',compact('categories'));

    }

    public function StoreSubCategory(Request $request){


        $request->validate([
            'sub_category_name' => 'required|unique:subcategories',
            'category_id' => 'required'
  
        ]);

        $category_id = $request->category_id;
        $category_name = Category::where ('id',$category_id)->value('category_name');


        SubCategory::insert([

            'sub_category_name'=>$request->sub_category_name,
            'slug'=>strtolower(str_replace('','-',$request->sub_category_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name
        ]);

        Category::where('id',$category_id)->increment('sub_category_count',1);

        return redirect()->route('allsubcategory')->with ('message',"Sub Category Added Successfully!");


      

    }
}
