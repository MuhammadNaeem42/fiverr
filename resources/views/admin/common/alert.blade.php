{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success solid  fade show">
        <strong>تم !</strong> {{ session('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger solid  fade show">
        <strong>خطأ !</strong> {{ session('error') }}
    </div>
@endif
