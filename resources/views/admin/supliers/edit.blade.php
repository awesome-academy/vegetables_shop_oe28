@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.edit_supliers') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('supliers.update', $supliers->id) }}" method="POST" class="form-horizontal">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>{{ trans('messages.name') }}:</label>
                <input type="text" class="form-control" name="name" value="{{ $supliers->name }}">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.address') }}:</label>
                <input type="text" class="form-control" name="address" value="{{ $supliers->address }}">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.phone') }}:</label>
                <input type="text" class="form-control" name="phone" value="{{ $supliers->phone }}">
            </div>
            <div class="form-group">
                <label>{{ trans('messages.email') }}:</label>
                <input type="email" class="form-control" name="email" value="{{ $supliers->email }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit_edit') }}</button>
        </form>
    </div>
@endsection
