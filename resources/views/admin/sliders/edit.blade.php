@extends('admin.layouts.app')

@section('title', trans('lang.edit').' '.trans('sliders.slider'))



@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @include('includes.errors')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="ms-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2"> {{trans('sliders.edit')}} </h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            {!! Form::model($slider, ['route' => ['admin.sliders.update', $slider->id], 'method' => 'patch', 'files' => true]) !!}

                            <input type="hidden" value="{{$slider->id}}" name="id">

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

