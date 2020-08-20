@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.edit_category') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-horizontal">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>{{ trans('messages.name') }}:</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit_edit') }}</button>
        </form>
    </div>
@endsection
