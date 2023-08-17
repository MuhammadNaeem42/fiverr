@extends('admin.layouts.app')

@section('title', trans('settings.settings'))

@section('content')



    <div class="content-body">

        <div class="container-fluid">

            <!-- row -->
            <div class="row">
                {{-- Alert Messages --}}
                @include('admin.common.alert')
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('settings.general')}}</h4>
                        </div>

                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.settings.updateSettings','files'=>true]) !!}

                            @include('admin.settings.fields')
                            {!! Form::close() !!}

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
