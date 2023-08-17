<div class="row">

    <!-- name_ar Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('name_ar', __('categories.name_ar').':') !!}
        {!! Form::text('name_ar', null, ['class' => 'form-control' . ($errors->has('name_ar')?' is-invalid':'')  ]) !!}
        @if ($errors->has('name_ar'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('name_ar') }}</small>
         </span>
        @endif
    </div>

    <!-- name_en Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('name_en', __('categories.name_en').':') !!}
        {!! Form::text('name_en', null, ['class' => 'form-control' . ($errors->has('name_en')?' is-invalid':'')  ]) !!}
        @if ($errors->has('name_en'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('name_en') }}</small>
         </span>
        @endif
    </div>

    <!-- status Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('is_active', __('categories.status').':') !!}
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
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
    </div>
</div>
@push('css')
@endpush
@push('script')

    <script>
        $(".select2").select2();

    </script>
@endpush
