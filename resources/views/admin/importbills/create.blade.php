@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <h2>{{ trans('templates.add_import_bill') }}</h2>
        @include('admin.layouts.common.errors')
        @if (session()->has('error_required'))
            <div class="alert alert-danger">
                {{ session()->get('error_required') }}
            </div>
        @endif
        <form action="{{ route('import-bills.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group col-md-12">
                <div class="col-md-6 form-sl-p">
                    <label>
                        {{ trans('templates.supplier') }}:
                        <span class="required-input">{{ config('path-img.require_input') }}</span>
                    </label>
                    <select name="suplier_id" class="form-control">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 form-sl-p">
                <label>
                    {{ trans('templates.import_date') }}:
                    <span class="required-input">{{ config('path-img.require_input') }}</span>
                </label>
                <input type="date" class="form-control col-md-12" name="import_date" value="{{ old('import_date') }}">
            </div>
            <div class="add-new-item-product container">
                <p>{{ trans('templates.item_1') }}: </p>
                <div>
                    <div class="item-create">
                        <div class="form-group col-md-12">
                            <div class="col-md-6 form-sl-p">
                                <label>
                                    {{ trans('templates.outdate') }}:
                                    <span class="required-input">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="date" class="form-control col-md-12" name="outdate[]">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-6 form-sl-p">
                                <label>
                                    {{ trans('templates.product') }}:
                                    <span class="required-input">{{ config('path-img.require_input') }}</span>
                                </label>
                                <select name="product_id[]" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-sl-p">
                                <label class="col-md-12">
                                    {{ trans('templates.import_price') }}:
                                    <span class="required-input">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="text" class="form-control col-md-12" name="import_price[]">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-6 form-sl-p">
                                <label class="col-md-12">{{ trans('templates.weight') . '(' . config('path-img.unit') . ')' }} :
                                    <span class="required-input">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="text" class="form-control col-md-12" name="weight[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <a href="javascript:" id="add-new-item" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
                <div class="show-new-item"></div>
                <button type="submit" class="btn btn-primary">{{ trans('templates.submit') }}</button>
            </div>
        </form>
    </div>

@endsection
