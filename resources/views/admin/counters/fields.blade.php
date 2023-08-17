<div class="row">

    @foreach([1,2,3,4] as $key=>$counter)
        <h3 class="mt-3">{{trans('counters.singular')}} {{$counter}}</h3>
        <!-- name_ar Field -->
        <div class="form-group col-sm-4 col-lg-4 mb-3">
            {!! Form::label('counters_'.$counter.'_name_ar', __('counters.name_ar').':') !!}
            {!! Form::text('counters_'.$counter.'_name_ar', setting('counters_'.$counter.'_name_ar'), ['class' => 'form-control' . ($errors->has('counters_'.$counter.'_name_ar')?' is-invalid':'') ]) !!}
            @if ($errors->has('counters_'.$counter.'_name_ar'))
                <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('counters_'.$counter.'_name_ar') }}</small>
         </span>
            @endif
        </div>

        <!-- name_en Field -->
        <div class="form-group col-sm-4 col-lg-4 mb-3">
            {!! Form::label('counters_'.$counter.'_name_en', __('counters.name_en').':') !!}
            {!! Form::text('counters_'.$counter.'_name_en', setting('counters_'.$counter.'_name_en'), ['class' => 'form-control' . ($errors->has('counters_'.$counter.'_name_en')?' is-invalid':'') ]) !!}
            @if ($errors->has('counters_'.$counter.'_name_en'))
                <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('counters_'.$counter.'_name_en') }}</small>
         </span>
            @endif
        </div>

        <!-- counters_1_number Field -->
        <div class="form-group col-sm-4 col-lg-4 mb-3">
            {!! Form::label('counters_'.$counter.'_number', __('counters.number').':') !!}
            {!! Form::text('counters_'.$counter.'_number', setting('counters_'.$counter.'_number'), ['class' => 'form-control' . ($errors->has('counters_'.$counter.'_number')?' is-invalid':'') ]) !!}
            @if ($errors->has('counters_'.$counter.'_number'))
                <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('counters_'.$counter.'_number') }}</small>
         </span>
            @endif
        </div>
    @endforeach




<!-- Submit Field -->
    <div class="btn-showcase">
        {!! Form::submit(ucfirst(__('lang.save')), ['class' => 'btn btn-primary']) !!}
        <input class="btn btn-light" type="reset" value="{{ucfirst(__('lang.reset'))}}">
        <a href="{{ route('admin.counters.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
    </div>
</div>

