@extends('admin.layouts.app')


@section('title', trans('contacts.contacts'))


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('contacts.contacts')}} </h4>
                                <span> {{trans('contacts.sub_title')}} </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('admin.contacts.table')

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
