@extends('admin.layouts.template')
@section('content')
@section('page_title')
Edit Product Image - shadycom
@endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product Image </h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Product Image </h5>
                    <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_name">Previous Image</label>
                            <div class="col-sm-10">
                                <img  src ="{{asset($productinfo->product_img)}} "alt="" >
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$productinfo->id}}">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="formFile">Upload New Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="product_img"/>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Upadea Product Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection