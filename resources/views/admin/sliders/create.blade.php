@extends('admin.layouts.app')

@section('title', trans('lang.add_new').' '.trans('sliders.slider'))



@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @include('includes.errors')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('sliders.add_new')}} </h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {!! Form::open(['route' => 'admin.sliders.store', 'files' => true]) !!}

                            @include('admin.sliders.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.dropify')

