<ul class="nav nav-pills" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-General-tab" data-bs-toggle="pill" href="#pills-General"
           role="tab" aria-controls="pills-General"
           aria-selected="true">{{trans('settings.general')}}
            <div class="media"></div>
        </a>
    </li>



    <li class="nav-item">
        <a class="nav-link " id="pills-mail-tab" data-bs-toggle="pill" href="#pills-mail"
           role="tab" aria-controls="pills-mail"
           aria-selected="true">{{trans('settings.mail')}}
            <div class="media"></div>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="pills-Contact-tab" data-bs-toggle="pill" href="#pills-Contact"
           role="tab" aria-controls="pills-Contact"
           aria-selected="false">{{trans('settings.Contact')}}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="pills-Social-tab" data-bs-toggle="pill" href="#pills-Social" role="tab"
           aria-controls="pills-Social"
           aria-selected="false">{{trans('settings.Social')}}</a>
    </li>


    <li class="nav-item">
        <a class="nav-link" id="pills-CSS-tab" data-bs-toggle="pill" href="#pills-CSS"
           role="tab" aria-controls="pills-CSS"
           aria-selected="false">{{trans('settings.CSS')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-JS-tab" data-bs-toggle="pill" href="#pills-JS"
           role="tab" aria-controls="pills-JS"
           aria-selected="false">{{trans('settings.JS')}}</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-General" role="tabpanel" aria-labelledby="pills-General-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.general')
        </div>
    </div>

    <div class="tab-pane fade" id="pills-mail" role="tabpanel" aria-labelledby="pills-mail-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.mail')
        </div>
    </div>
    <div class="tab-pane fade" id="pills-Contact" role="tabpanel" aria-labelledby="pills-Contact-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.contact')
        </div>
    </div>
    <div class="tab-pane fade" id="pills-Social" role="tabpanel" aria-labelledby="pills-Social-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.social')
        </div>
    </div>

    <div class="tab-pane fade" id="pills-CSS" role="tabpanel" aria-labelledby="pills-CSS-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.custom_css_code')
        </div>
    </div>
    <div class="tab-pane fade" id="pills-JS" role="tabpanel" aria-labelledby="pills-JS-tab">
        <div class="mb-0 mt-5">
            @include('admin.settings.custom_js_code')
        </div>
    </div>
</div>


@can('update_settings')
    <input name="type_page_setting" value="general" hidden>
    <!-- Submit Field -->
    <div class="btn-showcase mt-5">
        {!! Form::submit(ucfirst(__('lang.save')), ['class' => 'btn btn-primary']) !!}
        <input class="btn btn-light" type="reset" value="{{ucfirst(__('lang.reset'))}}">
    </div>
@endcan

