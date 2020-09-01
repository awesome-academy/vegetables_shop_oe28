@extends('admin.layouts.app')
@section('content')

    <h1>{{ trans('templates.detail_import_bill') }}</h1>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container detail-import-bill">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        @php $supplier = $importBill->supplier->first(); @endphp
                                        <th class="col-md-auto">{{ trans('templates.supplier') }}</th>
                                        <th class="col-md-auto">{{ $supplier['name'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.import_date') }}</td>
                                        <td>{{ $importBill->import_date }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th class="col-md-auto">{{ trans('templates.product') }}</th>
                                    <th class="col-md-auto">
                                        {{ trans('templates.weight') }}
                                    </th>
                                    <th class="col-md-auto">{{ trans('templates.import_price') }}</th>
                                    <th class="col-md-auto">{{ trans('templates.outdate') }}</th>
                                </tr>
                                @php $importBillProducts = $importBill->importBillProducts->all(); @endphp
                                @foreach ($importBillProducts as $importBillProduct)
                                    <tr role="row">
                                        @php $product = $importBillProduct->product; @endphp
                                        <th class="col-md-auto">{{ $product['name'] }}</th>
                                        <th class="col-md-auto">
                                            {{ $importBillProduct->weight . ' ' . $importBillProduct->unit }}
                                        </th>
                                        <th class="col-md-auto">
                                            {{ number_format($importBillProduct->import_price) . config('number-items.unit') }}
                                        </th>
                                        <th class="col-md-auto">{{ $importBillProduct->outdate }}</th>
                                     </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
