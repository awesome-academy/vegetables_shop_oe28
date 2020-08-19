@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ trans('messages.dashboard') }}</h1>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ trans('messages.earning') }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ trans('messages.price') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ trans('messages.earning_overview') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"                                                                                                                         aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">{{ trans('messages.dropdown_header') }}</div>
                                <a class="dropdown-item" href="#">{{ trans('messages.action') }}</a>
                                <a class="dropdown-item" href="#">{{ trans('messages.another_action') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{ trans('messages.something_else_here') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ trans('messages.revenue_sources') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">{{ trans('messages.dropdown_header') }}</div>
                                <a class="dropdown-item" href="#">{{ trans('messages.action') }}</a>
                                <a class="dropdown-item" href="#">{{ trans('messages.another_action') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">{{ trans('messages.something_else') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> {{ trans('messages.direct') }}
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> {{ trans('messages.social') }}
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> {{ trans('messages.referral') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
