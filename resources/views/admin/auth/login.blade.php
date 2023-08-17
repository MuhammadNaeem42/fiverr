@extends('admin.auth.layouts.app')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <img src="{{asset(setting('logo'))}}" width="100px" alt="logo">
                        </div>
                        <h4 class="text-center mb-4">{{trans('lang.Log_in_to_your_account')}}</h4>


                        @include('admin.common.alert')
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1"><strong>{{trans('lang.email')}}</strong></label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>{{trans('lang.password')}}</strong></label>
                                <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ms-1">
                                        <input type="checkbox" class="form-check-input ms-2" name="remember"
                                               id="basic_checkbox_1">
                                        <label class="form-check-label" for="basic_checkbox_1">
                                            {{trans('lang.remember_me')}}
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{trans('lang.login')}}
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
