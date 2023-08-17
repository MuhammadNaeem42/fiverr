<div class="row">
    <!-- name_ar Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('name_ar', __('sliders.name_ar').':') !!}
        {!! Form::text('name_ar', null, ['class' => 'form-control' . ($errors->has('name_ar')?' is-invalid':'') ]) !!}
        @if ($errors->has('name_ar'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('name_ar') }}</small>
         </span>
        @endif
    </div>

    <!-- name_en Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('name_en', __('sliders.name_en').':') !!}
        {!! Form::text('name_en', null, ['class' => 'form-control' . ($errors->has('name_en')?' is-invalid':'') ]) !!}
        @if ($errors->has('name_en'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('name_en') }}</small>
         </span>
        @endif
    </div>


    <!-- Photo Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('images', __('sliders.images').':') !!}
        {!! Form::file('images[]',['accept'=>'.jpg, .png, image/jpeg, image/png','data-default-file'=>'', 'data-height'=>'150','class' => 'form-control  '. ($errors->has('images')?' is-invalid':''),'multiple'=>'multiple']) !!}

        @if ($errors->has('images'))
            <span class="invalid-feedback">

                     <small class="text-danger">{{ $errors->first('images') }}</small>

                 </span>
        @endif
    </div>
    <div class="clearfix"></div>

    <!-- status Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('category_id', __('sliders.category_id').':') !!}
        {!! Form::select('category_id',\App\Models\Category::pluck('name_ar','id')->toArray() , null, ['class' => 'form-control select2 '. ($errors->has('category_id')?' is-invalid ':'')]) !!}

        @if ($errors->has('category_id'))
            <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('category_id') }}</small>

             </span>
        @endif
    </div>

    <!-- status Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('is_active', __('sliders.status').':') !!}
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
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
    </div>
</div>

@include('includes.intltelinput')
