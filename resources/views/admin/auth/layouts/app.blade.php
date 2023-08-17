<!DOCTYPE html>
<html lang="en" class="h-100">
{{-- Head Before AUTH--}}
@include('admin.auth.includes.head')


<body class="vh-100">
<div class="authincation h-100">
    <div class="container h-100">
        {{-- Content Goes Here FOR Before AUTH --}}
        @yield('content')

    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->

@include('admin.auth.includes.scripts')
</body>

</html>
