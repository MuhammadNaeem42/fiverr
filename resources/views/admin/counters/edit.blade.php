@extends('admin.layouts.app')

@section('title', trans('lang.edit').' '.trans('counters.counter'))



@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @include('includes.errors')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('counters.counters')}} </h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {!! Form::open( ['route' => ['admin.counters.update'], 'method' => 'post', 'files' => true]) !!}

                            <input name="type_page_setting" value="counters" hidden>

                            @include('admin.counters.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@include('includes.dropify')

