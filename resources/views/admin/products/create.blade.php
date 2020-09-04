@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.add_product') }}</h2>
        @if (session()->has('error_image'))
            <div class="alert alert-danger">
                {{ session()->get('error_image') }}
            </div>
        @endif
        @include('admin.layouts.common.errors')
        <form action="{{ route('products.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label>{{ trans('templates.name') }}:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.category') }}:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>{{ trans('templates.supplier') }}:</label>
                <select name="suplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>{{ trans('templates.price') }}:</label>
                <input type="text" class="form-control" name="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.price_discount') }}:</label>
                <input type="text" class="form-control" name="price_discount" value="{{ old('price_discount') }}">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.weight_item') }}:</label>
                <input type="text" class="form-control" name="weight_item" value="{{ old('weight_item') }}">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.select_image') }}:</label> <br>
                <input type="file" class="form-control" multiple id="gallery-photo-add" name="image_path[]"> <br>
                <div class="gallery"></div>
            </div>
            <div class="form-group">
                <label>{{ trans('templates.description') }}:</label>
                <textarea id="editor1" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
        </form>
    </div>
@endsection
