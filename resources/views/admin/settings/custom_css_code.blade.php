
<!-- custom_css_codes Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('custom_css_codes', __('settings.CSS').': ').'( </span>'.trans('settings.Css Codes Description').' </span>) ' !!}
    {!! Form::textarea('custom_css_codes', setting('custom_css_codes',null), ['class' => 'form-control  '. ($errors->has('custom_css_codes')?' is-invalid ':'')]) !!}

    @if ($errors->has('custom_css_codes'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('custom_css_codes') }}</small>

        </span>
    @endif
</div>


