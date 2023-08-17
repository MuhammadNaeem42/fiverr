<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-12 col-lg-6 mb-3">
        {!! Form::label('first_name', __('users.first_name').':') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control' . ($errors->has('first_name')?' is-invalid':'') ,'minlength' => 3,'maxlength' => 100 ]) !!}
        @if ($errors->has('first_name'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('first_name') }}</small>

         </span>
        @endif
    </div>
    <div class="form-group col-sm-12 col-lg-6 mb-3">
        {!! Form::label('last_name', __('users.last_name').':') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control' . ($errors->has('last_name')?' is-invalid':'') ,'minlength' => 3,'maxlength' => 100 ]) !!}
        @if ($errors->has('last_name'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('last_name') }}</small>

         </span>
        @endif
    </div>


    <!-- Email Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('email', __('users.email').':') !!}
        {!! Form::email('email', null, ['class' => 'form-control'. ($errors->has('email')?' is-invalid ':'') ,'minlength' => 3,'maxlength' => 255]) !!}

        @if ($errors->has('email'))
            <span class="invalid-feedback">
           <small class="text-danger">{{ $errors->first('email') }}</small>
         </span>
        @endif
    </div>
    <!-- mobile_number Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('mobile_number', __('users.mobile_number').':') !!}
        {!! Form::text('mobile_number', null, ['class' => 'form-control'. ($errors->has('mobile_number')?' is-invalid ':'') ,'minlength' => 7,'maxlength' => 15]) !!}

        @if ($errors->has('mobile_number'))
            <span class="invalid-feedback">
           <small class="text-danger">{{ $errors->first('mobile_number') }}</small>
         </span>
        @endif
    </div>


    <!-- Password Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('password', __('users.password').':') !!}
        {!! Form::password('password', ['class' => 'form-control'. ($errors->has('password')?' is-invalid ':'') ,'minlength' => 6]) !!}

        @if ($errors->has('password'))
            <span class="invalid-feedback">
         <small class="text-danger">{{ $errors->first('password') }}</small>

         </span>
        @endif
    </div>


    <!-- Photo Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('photo', __('users.photo').':') !!}
        {!! Form::file('photo',['accept'=>'.jpg, .png, image/jpeg, image/png','data-default-file'=>(isset($user->photo)?$user->photo:''), 'data-height'=>'150','class' => 'form-control dropify '. ($errors->has('photo')?' is-invalid':'')]) !!}

        @if ($errors->has('photo'))
            <span class="invalid-feedback">

                     <small class="text-danger">{{ $errors->first('photo') }}</small>

                 </span>
        @endif
    </div>
    <div class="clearfix"></div>

    <div class="col-12">
        <div class="table-responsive border rounded my-3">
            <h6 class="py-2 mx-1 mb-0 font-medium-2">
                <i class="font-medium-3 mr-25 feather icon-lock"></i>
                <span class="align-middle">{{ucfirst(__('users.permissions'))}}</span>
            </h6>
            <table class="table table-striped table-borderless">
                <thead class="thead-light">
                <tr>
                    <th>{{ucfirst(__('users.module'))}}</th>
                    @foreach($mapPermission as $p => $perm)
                        <th>{{ucfirst(__('users.'.$perm))}}</th>
                    @endforeach

                </tr>
                </thead>

                <tbody>
                @forelse($modules as $module => $value)
                    <tr>
                        <td><b>{{ucfirst(__('users.'.$module))}}</b></td>
                        @foreach($mapPermission as $p => $perm)
                            @if(collect(explode(',', $value))->contains($p) )
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="{{$perm}}_{{$module}}"
                                               value="{{$perm.'_'.$module}}"
                                               {{ (is_array(old('permissions',$user_permissions)) && in_array($perm.'_'.$module, old('permissions',$user_permissions))) ? ' checked' : '' }}
                                               name="permissions[]"/>
                                        <label class="custom-control-label"
                                               for="{{$perm}}_{{$module}}"></label>
                                    </div>
                                </td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                @empty
                @endforelse

                </tbody>
            </table>
        </div>
        @error('permissions')
        <small class="text-danger"> {{$message}}</small>
        @enderror
    </div>

    <!-- status Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('is_active', __('users.status').':') !!}
        {!! Form::select('is_active', [1=>trans('lang.active'),0=>trans('lang.not_active')], null, ['class' => 'form-control default-select '. ($errors->has('is_active')?' is-invalid ':'')]) !!}

        @if ($errors->has('is_active'))
            <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('is_active') }}</small>

             </span>
        @endif
    </div>


    <!-- Submit Field -->
    <div class="btn-showcase">
        {!! Form::submit(ucfirst(__('lang.save')), ['class' => 'btn btn-primary']) !!}
        <input class="btn btn-light" type="reset" value="{{ucfirst(__('lang.reset'))}}">
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
    </div>
</div>
@include('includes.intltelinput')
