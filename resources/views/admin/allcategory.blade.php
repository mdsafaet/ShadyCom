@extends('admin.layouts.template')
@section('content')
@section('page_title')
All Category-shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Category</h4>
    <div class="card">
        <h5 class="card-header">Available Category Information</h5>
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
                        <th>Category Name</th>
                        <th>Sub Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        @foreach ($categories as $category)
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->subcategory_count}}</td>
                        <td>{{$category->slug}}</td>

        
                        <td>
                            <a href="{{route('editcategory',$category->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('deletecategory',$category->id)}}" class="btn btn-warning">Delete</a>
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
