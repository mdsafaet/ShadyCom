@extends('admin.layouts.template')
@section('content')
@section('page_title')
Edit SubCategory-shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit SubCategory</h4>
    
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Sub Category</h5>
                    <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatesubcategory') }}" method="POST">
                        @csrf
                        <input type="hidden" name="subcatid" value="{{ $subcatinfo->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory-name">SubCategory Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" value="{{ $subcatinfo->sub_category_name }}" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
