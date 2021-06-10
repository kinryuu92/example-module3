@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'product', 'key'=>'Edit'])
        <form action="{{ route('product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control"
                                       placeholder="Nhập tên sản phẩm " name="name"
                                       value="{{ $product->name }}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control-file"
                                       placeholder="Nhập giá sản phẩm " name="price"
                                       value="{{ $product->price }}"
                                >
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control-file"
                                       name="feature_image_path">
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                @foreach($product->category as $productCategory)
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {{ $productCategory->name }}
                                </select>
                                @endforeach

                            </div>

                        </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection

