@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.add_role') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('roles.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label>{{ trans('templates.name_role') }}:</label>
                <input type="text" class="form-control" name="role">
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
        </form>
    </div>
@endsection
