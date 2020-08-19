@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.add_category') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label>{{ trans('messages.name') }}:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
        </form>
    </div>
@endsection
