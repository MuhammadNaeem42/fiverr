@extends('admin.layouts.app')

@section('title', trans('lang.edit').' '.trans('partners.partner'))



@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @include('includes.errors')
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('partners.box1_partners')}} </h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {!! Form::open( ['route' => ['admin.partners.update'], 'method' => 'post', 'files' => true]) !!}

                            <input name="type_page_setting" value="partners" hidden>
                            <input name="type_partner" value="box1" hidden>

                            @include('admin.partners.fields_1')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('partners.box2_partners')}} </h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {!! Form::open( ['route' => ['admin.partners.update'], 'method' => 'post', 'files' => true]) !!}

                            <input name="type_page_setting" value="partners" hidden>
                            <input name="type_partner" value="box2" hidden>

                            @include('admin.partners.fields_2')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('includes.dropify')

