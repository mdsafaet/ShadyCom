@extends('admin.layouts.template')
@section('content')
@section('page_title')
All Category-shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Category</h4>
    <div class="card">
        <h5 class="card-header">Available Category Information</h5>
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
                        <td>1</td>
                        <td>Electronics</td>
                        <td>10</td>
                        <td>100</td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                    <!-- Additional rows would go here -->
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
