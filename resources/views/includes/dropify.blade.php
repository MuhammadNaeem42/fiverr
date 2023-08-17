@push('css')
    <link rel="stylesheet" href="{{ asset('css/dropify/dropify.css') }}">
@endpush



@push('script')
    <script src="{{ asset('js/dropify/dropify.js') }}"></script>
    <script>
        $('.dropify').dropify();

    </script>
@endpush
