<!-- application_name Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('application_name', __('settings.Application Name').':') !!}
    {!! Form::text('application_name', setting('application_name'), ['class' => 'form-control  '. ($errors->has('application_name')?' is-invalid ':'')]) !!}

    @if ($errors->has('application_name'))
        <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('application_name') }}</small>

        </span>
    @endif
</div>
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('phone', __('settings.phone').':') !!}
    {!! Form::text('phone', setting('phone'), ['class' => 'form-control  '. ($errors->has('phone')?' is-invalid ':'')]) !!}

    @if ($errors->has('phone'))
        <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('phone') }}</small>

        </span>
    @endif
</div><div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('currency', __('settings.currency').':') !!}
    {!! Form::text('currency', setting('currency'), ['class' => 'form-control  '. ($errors->has('currency')?' is-invalid ':'')]) !!}

    @if ($errors->has('currency'))
        <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('currency') }}</small>

        </span>
    @endif
</div>

<!-- logo Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('logo', __('settings.logo').':') !!}
    {!! Form::file('logo',['accept'=>'.jpg, .png, image/jpeg, image/png','data-default-file'=>(asset(setting('logo'))), 'data-height'=>'150','class' => 'form-control dropify '. ($errors->has('logo')?' is-invalid':'')]) !!}

    @if ($errors->has('logo'))
        <span class="invalid-feedback">

                     <small class="text-danger">{{ $errors->first('logo') }}</small>

                 </span>
    @endif
</div>
<div class="clearfix"></div>

