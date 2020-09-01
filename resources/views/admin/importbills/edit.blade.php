@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>{{ trans('templates.edit_import_bill') }}</h2>
        @include('admin.layouts.common.errors')
        <form action="{{ route('import-bills.update', $importBill->id) }}" method="POST" class="form-horizontal">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>{{ trans('templates.supplier') }}:</label>
                <select name="suplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ ($supplier->id == $importBill->suplier_id) ? 'selected' : "" }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>{{ trans('templates.import_date') }}:</label>
                <input type="date" name="import_date" value="{{ $importBill->import_date }}"/>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
        </form>
    </div>
@endsection
