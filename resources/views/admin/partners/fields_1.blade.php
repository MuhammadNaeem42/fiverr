<div class="row">
    <!-- name_ar Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('box1_partners_name_ar', __('partners.name_ar').':') !!}
        {!! Form::text('box1_partners_name_ar', setting('box1_partners_name_ar'), ['class' => 'form-control' . ($errors->has('box1_partners_name_ar')?' is-invalid':'') ]) !!}
        @if ($errors->has('box1_partners_name_ar'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('box1_partners_name_ar') }}</small>
         </span>
        @endif
    </div>

    <!-- name_en Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('box1_partners_name_en', __('partners.name_en').':') !!}
        {!! Form::text('box1_partners_name_en', setting('box1_partners_name_en'), ['class' => 'form-control' . ($errors->has('box1_partners_name_en')?' is-invalid':'') ]) !!}
        @if ($errors->has('box1_partners_name_en'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('box1_partners_name_en') }}</small>
         </span>
        @endif
    </div>


    <!-- Photo Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('box1_partners_images', __('partners.images').':') !!}
        {!! Form::file('box1_partners_images[]',['accept'=>'.jpg, .png, image/jpeg, image/png','data-default-file'=>'', 'data-height'=>'150','class' => 'form-control  '. ($errors->has('box1_partners_images')?' is-invalid':''),'multiple'=>'multiple']) !!}

        @if ($errors->has('box1_partners_images'))
            <span class="invalid-feedback">

                     <small class="text-danger">{{ $errors->first('box1_partners_images') }}</small>

                 </span>
        @endif
    </div>
    <div class="clearfix"></div>


    <!-- Submit Field -->
    <div class="btn-showcase">
        {!! Form::submit(ucfirst(__('lang.save')), ['class' => 'btn btn-primary']) !!}
        <input class="btn btn-light" type="reset" value="{{ucfirst(__('lang.reset'))}}">
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
    </div>
</div>

