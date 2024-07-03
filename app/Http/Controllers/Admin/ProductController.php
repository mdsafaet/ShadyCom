<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function Index(){

        return view ('admin.allproduct');

    }

    public function AddProduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view ('admin.addproduct' , compact('categories','subcategories'));

    }
}
