@extends('admin.layouts.template')
@section('content')
@section('page_title')
All SubCategory-shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All SubCategory</h4>
    <div class="card">
        <h5 class="card-header">Available Sub Category Information</h5>
        @if(@session()->has('message'))
        <div class="alert alert-success">
           {{session()->get('message')}}
        </div>
       @endif 

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>SubCategory Name</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        @foreach ($allsubcategories as $subcategory)
                        <td>{{$subcategory->id}}</td>
                        <td>{{$subcategory->sub_category_name}}</td>
                        <td>{{$subcategory->category_name}}</td>
                        <td>{{$subcategory->product_count}}</td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Additional rows would go here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
