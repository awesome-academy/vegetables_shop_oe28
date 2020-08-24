@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.add_post') }}</h2>
        @if (session()->has('error_image'))
            <div class="alert alert-danger">
                {{ session()->get('error_image') }}
            </div>
        @endif
        @include('admin.layouts.common.errors')
        <form action="{{ route('posts.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label>{{ trans('templates.title') }}:</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.intro') }}:</label>
                <textarea id="editor1" name="intro"></textarea>
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
                <label>{{ trans('templates.price') }}:</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label>{{ trans('templates.price_discount') }}:</label>
                <input type="text" class="form-control" name="price_discount">
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
