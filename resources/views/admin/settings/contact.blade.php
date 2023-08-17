<div class="row">
    <!-- contact_address Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('contact_address', __('settings.Address').':') !!}
        {!! Form::text('contact_address', setting('contact_address',null), ['class' => 'form-control  '. ($errors->has('contact_address')?' is-invalid ':'')]) !!}

        @if ($errors->has('contact_address'))
            <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('contact_address') }}</small>

        </span>
        @endif
    </div>

    <!-- contact_email Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('contact_email', __('settings.Email').':') !!}
        {!! Form::email('contact_email', setting('contact_email',null), ['class' => 'form-control  '. ($errors->has('contact_email')?' is-invalid ':'')]) !!}

        @if ($errors->has('contact_email'))
            <span class="invalid-feedback">

                <small class="text-danger">{{ $errors->first('contact_email') }}</small>

        </span>
        @endif
    </div>

    <!-- contact_phone Field -->
    <div class="form-group col-sm-12 col-lg-12 mb-3">
        {!! Form::label('contact_phone', __('settings.Phone').':') !!}
        {!! Form::text('contact_phone', setting('contact_phone',null), ['class' => 'form-control  '. ($errors->has('contact_phone')?' is-invalid ':'')]) !!}

        @if ($errors->has('contact_phone'))
            <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('contact_phone') }}</small>

        </span>
        @endif
    </div>

    <!-- latitude Field -->
    <div class="form-group col-sm-12 col-lg-6 mb-3">
        {!! Form::label('latitude', __('settings.latitude').':') !!}
        {!! Form::text('latitude', setting('latitude',null), ['id'=>'latitude','class' => 'form-control  '. ($errors->has('latitude')?' is-invalid ':'')]) !!}

        @if ($errors->has('latitude'))
            <span class="invalid-feedback">

                <small
                    class="text-danger">{{ $errors->first('latitude') }}</small>

        </span>
        @endif
    </div>

    <!-- Longitude Field -->
    <div class="form-group col-sm-12 col-lg-6 mb-3">
        {!! Form::label('longitude', __('settings.longitude').':') !!}
        {!! Form::text('longitude', setting('longitude',null), ['id'=>'longitude','class' => 'form-control  '. ($errors->has('longitude')?' is-invalid ':'')]) !!}

        @if ($errors->has('longitude'))
            <span class="invalid-feedback">
                <small
                    class="text-danger">{{ $errors->first('longitude') }}</small>

        </span>
        @endif
    </div>

    <div class="form-group col-sm-12 col-lg-12 mb-3">
        <div style="height: 500px" id="map"></div>
    </div>

</div>



@push('script')

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlEtPOpBPVNDAX4qH2880d4hA20iKOOpI&callback=initMap&v=weekly&channel=2"
        async
    ></script>

    <script>
        function initMap() {

            const myLatlng = {lat: 24.774265, lng: 46.738586};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: myLatlng,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "حدد المنطقة التي تريدها",
                position: myLatlng,
            });

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                infoWindow.open(map);
                document.getElementById('latitude').value = mapsMouseEvent.latLng.toJSON()['lat'];
                document.getElementById('longitude').value = mapsMouseEvent.latLng.toJSON()['lng'];

            });
        }
    </script>
@endpush

