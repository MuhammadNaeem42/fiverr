@extends('admin.layouts.app')

@section('title', trans('lang.dashboard'))

@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <div class="container-fluid">
            <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                <h2 class="font-w600 title mb-2 ms-auto "> {{trans('lang.dashboard')}} </h2>

            </div>
            <div class="row">
                <div class="col-xl-4 col-sm-6 m-t35">
                    <div class="card card-coin">
                        <div class="card-body text-center">
                            <img src="https://img.icons8.com/dusk/64/000000/admin-settings-male.png"
                                 style="float: left;"/>

                            <h4 class="text-black mb-2 mt-2 font-w600"> {{trans('users.user_count')}} </h4>
                            <p class="mb-0 fs-14">

                                <span
                                    class="text-success ms-1">{{\App\Models\User::count()}}</span> {{trans('users.single_user')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 m-t35">
                    <div class="card card-coin">
                        <div class="card-body text-center">
                            <img style="float: left;"
                                 src="https://img.icons8.com/external-others-abderraouf-omara/344/external-Images-photography-and-equipements-others-abderraouf-omara.png" width="64px" height="64px"/>

                            <h4 class="text-black mb-2 mt-2 font-w600"> {{trans('sliders.slider_count')}} </h4>
                            <p class="mb-0 fs-13">

                                <span
                                    class="text-success ms-1">{{\App\Models\Slider::count()}}</span> {{trans('sliders.single_slider')}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 m-t35">
                    <div class="card card-coin">
                        <div class="card-body text-center">
                            <img style="float: left;"
                                 src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/000000/external-inventory-factory-flaticons-flat-flat-icons.png"/>

                            <h4 class="text-black mb-2 mt-2 font-w600">{{trans('categories.category_count')}}  </h4>
                            <p class="mb-0 fs-13">

                                <span
                                    class="text-success ms-1">{{\App\Models\Category::count()}} </span> {{trans('categories.single_category')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="ms-auto mb-sm-0 mb-3">
                        <h4 class="card-title mb-2">{{trans('lang.last_sliders_added')}}</h4>
                        <!-- <span>Lorem Ipsum sit amet</span> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {!! $dataTable->table([ 'class' => 'display dataTable table-responsive table style-1 display']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    {!! $dataTable->scripts() !!}
    @include('includes.notify.success')
    @include('includes.notify.errors')
    @include('includes.notify.delete')
@endpush
