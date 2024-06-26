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
    public function EditSubCategory($id){

        $subcatinfo = SubCategory::findOrFail($id);
 
        return view ('admin.editsubcat',compact('subcatinfo'));

    }

    public function UpdateSubCategory(Request $request){
        $request->validate([
            'sub_category_name' => 'required|unique:subcategories',
        ]);

        $subcatid = $request->subcatid;

        SubCategory::findOrFail($subcatid)->update([
            'sub_category_name'=>$request->sub_category_name,
            'slug'=>strtolower(str_replace('','-',$request->sub_category_name))
        ]);
     
         return redirect()->route('allsubcategory')->with ('message',"Sub Category Updated Successfully!");

}

public function DeleteSubCategory($id){

    $cat_id = Subcategory::where('id',$id)->value('category_id');

    Subcategory::findOrFail($id)->delete();
    
    Category::where('id',$cat_id)->decrement('sub_category_count',1);

    return redirect()->route('allsubcategory')->with ('message',"Sub Category Deleted Successfully!");
    
}
}

