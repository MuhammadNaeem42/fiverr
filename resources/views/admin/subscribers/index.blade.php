@extends('admin.layouts.app')


@section('title', trans('subscribers.subscribers'))


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('subscribers.subscribers')}} </h4>
                                <span> {{trans('subscribers.sub_title')}} </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('admin.subscribers.table')

                            </div>
                            <div class="pull-right mr-3">

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @include('includes.notify.success')
    @include('includes.notify.errors')
    @include('includes.notify.delete')
@endpush
