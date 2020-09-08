@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_product') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('products.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                            <tr>
                                <th>{{ trans('templates.id') }}</th>
                                <th>{{ trans('templates.image') }}</th>
                                <th>{{ trans('templates.name') }}</th>
                                <th>{{ trans('templates.category') }}</th>
                                <th>{{ trans('templates.supplier') }}</th>
                                <th>{{ trans('templates.price') }}</th>
                                <th>{{ trans('templates.price_discount') }}</th>
                                <th>{{ trans('templates.weight_available') }}</th>
                                <th>{{ trans('templates.edit') }}</th>
                                <th>{{ trans('templates.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>
                                    @php $image = $product->images->first(); @endphp
                                    @if (isset($image))
                                        <img class="img-show" src="{{ asset('img/'. $image['image_path']) }}">
                                    @endif
                                </td>
                                <td>
                                    {{ $product->name . '(' . $product->weight_item . config('path-img.unit') . ')' }}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', @$product->category_id) }}">
                                        {{ @$product->category->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('supliers.edit', $product->suplier_id ? $product->suplier_id : 0) }}">
                                        {{ @$product->supplier->name }}
                                    </a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->price_discount }}</td>
                                <td>{{ $product->weight_available }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete-sup" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" value="{{ $product->id }}">
                                            <i class="fa fa-trash">{{ trans('messages.delete') }}</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
