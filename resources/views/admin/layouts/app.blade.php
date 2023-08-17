<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('admin.common.head')


<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!-- Header -->
@include('admin.common.header')
<!-- End of Header -->

    <!-- Header -->
@include('admin.common.sidebar')
<!-- End of Header -->


    <!-- Begin Page Content -->
@yield('content')
<!-- /.container-fluid -->


</div>
<!--**********************************
        Content body end
    ***********************************-->

<!--**********************************
        Footer start
    ***********************************-->

<!-- Footer -->
@include('admin.common.footer')
<!-- End of Footer -->

<!--**********************************
        Footer end
    ***********************************-->


<!--**********************************
    Main wrapper end
***********************************-->


<!--**********************************
    Scripts
***********************************-->


<!-- Required vendors -->
<script src="{{ asset('dashboard/vendor/global/global.min.js')}}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>


<script src="{{ asset('dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('dashboard/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Apex Chart -->
{{--<script src="{{ asset('dashboard/vendor/apexchart/apexchart.js')}}"></script>--}}

<!-- Dashboard 1 -->
<script src="{{ asset('dashboard/js/dashboard/dashboard-1.js')}}"></script>

<script src="{{ asset('dashboard/vendor/owl-carousel/owl.carousel.js')}}"></script>


<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="{{ asset('dashboard/vendor/moment/moment.min.js')}}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- clockpicker -->
<script src="{{ asset('dashboard/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
<!-- asColorPicker -->
<script src="{{ asset('dashboard/vendor/jquery-asColor/jquery-asColor.min.js')}}"></script>
<script src="{{ asset('dashboard/vendor/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
<script src="{{ asset('dashboard/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js')}}"></script>
<!-- Material color picker -->
<script
    src="{{ asset('dashboard/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- pickdate -->
<script src="{{ asset('dashboard/vendor/pickadate/picker.js')}}"></script>
<script src="{{ asset('dashboard/vendor/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('dashboard/vendor/pickadate/picker.date.js')}}"></script>


<!-- Daterangepicker -->
<script src="{{ asset('dashboard/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
<!-- Clockpicker init -->
<script src="{{ asset('dashboard/js/plugins-init/clock-picker-init.js')}}"></script>
<!-- asColorPicker init -->
<script src="{{ asset('dashboard/js/plugins-init/jquery-asColorPicker.init.js')}}"></script>
<!-- Material color picker init -->
<script src="{{ asset('dashboard/js/plugins-init/material-date-picker-init.js')}}"></script>
<!-- Pickdate -->
<script src="{{ asset('dashboard/js/plugins-init/pickadate-init.js')}}"></script>
<script src="{{ asset('dashboard/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('dashboard/js/custom.js')}}"></script>
<script src="{{ asset('dashboard/js/deznav-init.js')}}"></script>
<script src="{{ asset('dashboard/js/plugins-init/pickadate-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

@include('includes.lazyload')
<script src="{{ asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{ asset('dashboard/vendor/fontawesome/all.min.js')}}"></script>

<!-- start pusher-->
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script>
    var path_mp3 = '{{asset('mp3')}}';

    function playSound(sound) {
        if (sound != null) {
            var activeMp3 = new Audio();
            activeMp3.autoplay = true;
            activeMp3.src = navigator.userAgent.match(/Firefox/) ? 'active.ogg' : path_mp3 + '/' + sound;

            activeMp3.play();
        }
    }

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'eu'
    });
    pusher.logToConsole = true;

    var channel = pusher.subscribe('new-Notify-Message');
    channel.bind('App\\Events\\NewNotify', function (data) {
            @php
                $auth_id= auth('admin')->id();
            @endphp
        var auth_id = parseInt('{{$auth_id}}');
        var ids = data.ids;
        // console.log('hey',ids,ids.includes(auth_id),auth_id);
        var isNotification = ids.includes(auth_id);
        if (isNotification === true) {
            var notificationsWrapper = $('.notification-bell');
            var notificationsPulse = notificationsWrapper.find('a');
            notificationsPulse.append('<div class="pulse-css"></div>');
            var notificationList = $('.myScrollNotification');
            var oldOutput = notificationList.html();
            var link = '{{url('admin/contracts/get_notification_link/')}}/' + data.notify_id;
            var photo_link = '{{ auth("admin")->user()->photo }}';
            var date = '{{Carbon\Carbon::now()->format('Y-m-d H:i')}}';
            var output = '<li>\n' +
                '    <a href="' + link + '">\n' +
                '        <div class="timeline-panel">\n' +
                '            <div class="media ms-2">\n' +
                '                <img alt="image" width="50"\n' +
                '                     src="' + photo_link + '">\n' +
                '            </div>\n' +
                '            <div class="media-body">\n' +
                '                <h6 class="mb-1">' + data.title + '</h6>\n' +
                '                <p class="mb-1">' + data.body + '</p>\n' +
                '                <small\n' +
                '                    class="d-block">' + date + '</small>\n' +
                '            </div>\n' +
                '        </div>\n' +
                '    </a>\n' +
                '</li>';
            playSound('notifiction.mp3');
            iziToast.success({
                timeout: 3000,
                theme: 'light',
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
                title: 'يوجد لديك اشعار جديد',
                message: '{{session('success')}}',
            });
            //  console.log('data_count', parseInt(data_count) + 1);
            notificationList.html(output + oldOutput);
        }

    });
</script>
<!-- end pusher-->

@stack('script')

</body>

</html>
