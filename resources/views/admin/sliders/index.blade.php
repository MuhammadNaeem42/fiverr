@extends('admin.layouts.app')


@section('title', trans('sliders.sliders'))


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('sliders.sliders')}} </h4>
                                <span> {{trans('sliders.sub_title')}} </span>
                            </div>
                            @can('create_sliders')
                                <a href="{{route('admin.sliders.create')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    {{trans('sliders.add_new')}}
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('admin.sliders.table')

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
    @include('includes.dropify')
@endpush
