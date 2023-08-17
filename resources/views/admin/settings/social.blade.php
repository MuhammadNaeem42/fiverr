<!-- facebook_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('facebook_url', __('settings.Facebook URL').':') !!}
    {!! Form::url('facebook_url', setting('facebook_url',null), ['class' => 'form-control  '. ($errors->has('facebook_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('facebook_url'))
        <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('facebook_url') }}</small>

        </span>
    @endif
</div>

<!-- twitter_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('twitter_url', __('settings.Twitter URL').':') !!}
    {!! Form::url('twitter_url', setting('twitter_url',null), ['class' => 'form-control  '. ($errors->has('twitter_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('twitter_url')))
    <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('twitter_url') }}</small>

        </span>
    @endif
</div>

<!-- instagram_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('instagram_url', __('settings.Instagram URL').':') !!}
    {!! Form::url('instagram_url', setting('instagram_url',null), ['class' => 'form-control  '. ($errors->has('instagram_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('instagram_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('instagram_url') }}</small>

        </span>
    @endif
</div>

<!-- pinterest_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('pinterest_url', __('settings.Pinterest URL').':') !!}
    {!! Form::url('pinterest_url', setting('pinterest_url',null), ['class' => 'form-control  '. ($errors->has('pinterest_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('pinterest_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('pinterest_url') }}</small>

        </span>
    @endif
</div>

<!-- linkedin_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('linkedin_url', __('settings.LinkedIn URL').':') !!}
    {!! Form::url('linkedin_url', setting('linkedin_url',null), ['class' => 'form-control  '. ($errors->has('linkedin_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('linkedin_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('linkedin_url') }}</small>

        </span>
    @endif
</div>

<!-- vk_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('vk_url', __('settings.VK URL').':') !!}
    {!! Form::url('vk_url', setting('vk_url',null), ['class' => 'form-control  '. ($errors->has('vk_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('vk_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('vk_url') }}</small>

        </span>
    @endif
</div>

<!-- telegram_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('telegram_url', __('settings.Telegram URL').':') !!}
    {!! Form::url('telegram_url', setting('telegram_url',null), ['class' => 'form-control  '. ($errors->has('telegram_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('telegram_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('telegram_url') }}</small>

        </span>
    @endif
</div>

<!-- youtube_url Field -->
<div class="form-group col-sm-12 col-lg-12 mb-3">
    {!! Form::label('youtube_url', __('settings.Youtube URL').':') !!}
    {!! Form::url('youtube_url', setting('youtube_url',null), ['class' => 'form-control  '. ($errors->has('youtube_url')?' is-invalid ':'')]) !!}

    @if ($errors->has('youtube_url'))
        <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('youtube_url') }}</small>

        </span>
    @endif
</div>

<!-- Social Media Field -->
@foreach(getSocialMedia() as $key=>$social)
    <div class="form-group col-sm-12 col-lg-6 mb-3">
        {!! Form::label($key, $social['title'].':') !!}
        {!! Form::text($key, $social['url'], ['class' => 'form-control' . ($errors->has($key)?' is-invalid':'')  ]) !!}

        @if ($errors->has($key))
            <span class="invalid-feedback">

            <small class="text-danger">{{ $errors->first($key) }}</small>

       </span>
        @endif
    </div>
@endforeach
