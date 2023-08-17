@extends('admin.layouts.app')


@section('title', trans('categories.categories'))


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('categories.categories')}} </h4>
                                <span> {{trans('categories.sub_title')}} </span>
                            </div>
                            @can('create_categories')
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    {{trans('categories.add_new')}}
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('admin.categories.table')

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
