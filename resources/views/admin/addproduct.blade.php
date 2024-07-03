@extends('admin.layouts.template')
@section('content')
@section('page_title')
Add Product-shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
                    <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Product Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" placeholder="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Product Short  Description</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="product_short_des" id="product_short_des" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Product long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="product_long_des" id="product_long_des" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="select-category">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id }}">{{$category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="select-category">Select SubCategory</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="product_sub_category_id" name="product_sub_category_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{$subcategory->id }}">{{$subcategory->sub_category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">Upload Product Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
