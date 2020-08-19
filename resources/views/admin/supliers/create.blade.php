@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('messages.add_suplier') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('supliers.store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label>{{ trans('messages.name') }}:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.address') }}:</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.phone') }}:</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.email') }}:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
