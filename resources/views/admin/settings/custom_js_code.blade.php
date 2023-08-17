
<!-- custom_javascript_codes Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('custom_javascript_codes', __('settings.JS').': ').'( </span>'.trans('settings.JS Codes Description').' </span>) ' !!}
    {!! Form::textarea('custom_javascript_codes', setting('custom_javascript_codes',null), ['class' => 'form-control  '. ($errors->has('custom_javascript_codes')?' is-invalid ':'')]) !!}

    @if ($errors->has('custom_javascript_codes'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('custom_javascript_codes') }}</small>

        </span>
    @endif
</div>


