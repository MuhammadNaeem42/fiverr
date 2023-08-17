@extends('admin.layouts.app')


@section('title', trans('users.users'))


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('users.users')}} </h4>
                                <span> {{trans('users.sub_title')}} </span>
                            </div>
                            @can('create_admins')
                                <a href="{{route('admin.users.create')}}" class="btn btn-primary">
                                    <img width="26px"
                                         src="https://img.icons8.com/external-bluetone-bomsymbols-/91/000000/external-add-user-general-office-bluetone-bluetone-bomsymbols-.png"
                                         class="mb-2 m-1">
                                    {{trans('users.add_new')}}
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @include('admin.users.table')

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
