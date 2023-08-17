@extends('admin.layouts.app')

@section('title', trans('lang.profile'))

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
                            <h4 class="card-title"> {{trans('lang.profile')}}</h4>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" width="150px"
                                         src="{{ auth('admin')->user()->photo }}">
                                    <span class="font-weight-bold">{{ auth('admin')->user()->full_name }}</span>
                                    <span class="text-black-50"><i>Role:
                            {{ auth('admin')->user()->roles
                                ? auth('admin')->user()->roles->pluck('name')->first()
                                : 'N/A' }}</i></span>
                                    <span class="text-black-50">{{ auth('admin')->user()->email }}</span>
                                </div>
                            </div>
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label class="labels">{{trans('users.first_name')}}</label>
                                        <input type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name" placeholder="First Name"
                                               value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}">

                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels">{{trans('users.last_name')}}</label>
                                        <input type="text" name="last_name"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}"
                                               placeholder="Last Name">

                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels">{{trans('users.mobile_number')}}</label>
                                        <input type="text"
                                               class="form-control @error('mobile_number') is-invalid @enderror"
                                               name="mobile_number"
                                               value="{{ old('mobile_number') ? old('mobile_number') : auth()->user()->mobile_number }}"
                                               placeholder="Mobile Number">
                                        @error('mobile_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        {!! Form::label('photo', __('users.photo').':') !!}
                                        {!! Form::file('photo',['accept'=>'.jpg, .png, image/jpeg, image/png','data-default-file'=>(asset(auth('admin')->user()->photo)), 'data-height'=>'150','class' => 'form-control dropify '. ($errors->has('photo')?' is-invalid':'')]) !!}

                                        @if ($errors->has('photo'))
                                            <span class="invalid-feedback">

                                                 <small class="text-danger">{{ $errors->first('photo') }}</small>

                                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">{{trans('lang.update_profile')}}
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> {{trans('lang.change_password')}}</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.profile.change-password') }}" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label class="labels">{{trans('lang.current_password')}}</label>
                                        <input type="password" name="current_password"
                                               class="form-control @error('current_password') is-invalid @enderror"
                                               placeholder="{{trans('lang.current_password')}}" required>
                                        @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels">{{trans('lang.new_password')}}</label>
                                        <input type="password" name="new_password"
                                               class="form-control @error('new_password') is-invalid @enderror"
                                               required placeholder="{{trans('lang.new_password')}}">
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="labels">{{trans('lang.confirm_password')}}</label>
                                        <input type="password" name="new_confirm_password"
                                               class="form-control @error('new_confirm_password') is-invalid @enderror"
                                               required placeholder="{{trans('lang.confirm_password')}}">
                                        @error('new_confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">{{trans('lang.change_password')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

@endsection
@include('includes.intltelinput')

@push('script')
    @include('includes.notify.success')
    @include('includes.notify.errors')
    @include('includes.dropify')
@endpush
