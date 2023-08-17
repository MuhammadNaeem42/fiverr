<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_HOST', __('settings.MAIL_HOST').' :') !!}
    {!! Form::text('MAIL_HOST', setting('MAIL_HOST'), ['class' => 'form-control  '. ($errors->has('MAIL_HOST')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_HOST'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_HOST') }}</small>
        </span>
    @endif
</div>

<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_PORT', __('settings.MAIL_PORT').' :') !!}
    {!! Form::text('MAIL_PORT', setting('MAIL_PORT'), ['class' => 'form-control  '. ($errors->has('MAIL_PORT')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_PORT'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_PORT') }}</small>
        </span>
    @endif
</div>
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_ENCRYPTION', __('settings.MAIL_ENCRYPTION').' :') !!}
    {!! Form::text('MAIL_ENCRYPTION', setting('MAIL_ENCRYPTION'), ['class' => 'form-control  '. ($errors->has('MAIL_ENCRYPTION')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_ENCRYPTION'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_ENCRYPTION') }}</small>
        </span>
    @endif
</div>

<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_USERNAME', __('settings.MAIL_USERNAME').' :') !!}
    {!! Form::text('MAIL_USERNAME', setting('MAIL_USERNAME'), ['class' => 'form-control  '. ($errors->has('MAIL_USERNAME')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_USERNAME'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_USERNAME') }}</small>
        </span>
    @endif
</div>
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_PASSWORD', __('settings.MAIL_PASSWORD').' :') !!}
    {!! Form::text('MAIL_PASSWORD', setting('MAIL_PASSWORD'), ['class' => 'form-control  '. ($errors->has('MAIL_PASSWORD')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_PASSWORD'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_PASSWORD') }}</small>
        </span>
    @endif
</div>
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_FROM_ADDRESS', __('settings.MAIL_FROM_ADDRESS').' :') !!}
    {!! Form::email('MAIL_FROM_ADDRESS', setting('MAIL_FROM_ADDRESS'), ['class' => 'form-control  '. ($errors->has('MAIL_FROM_ADDRESS')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_FROM_ADDRESS'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_FROM_ADDRESS') }}</small>
        </span>
    @endif
</div>

<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('MAIL_FROM_NAME', __('settings.MAIL_FROM_NAME').' :') !!}
    {!! Form::text('MAIL_FROM_NAME', setting('MAIL_FROM_NAME'), ['class' => 'form-control  '. ($errors->has('MAIL_FROM_NAME')?' is-invalid ':'')]) !!}
    @if ($errors->has('MAIL_FROM_NAME'))
        <span class="invalid-feedback">
            <small class="text-danger">{{ $errors->first('MAIL_FROM_NAME') }}</small>
        </span>
    @endif
</div>


