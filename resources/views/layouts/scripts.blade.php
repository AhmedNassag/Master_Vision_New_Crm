<!--begin::Javascript-->
<script>var hostUrl = "{{ asset('new-theme/assets/') }}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('new-theme/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('new-theme/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('new-theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ asset('new-theme/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('new-theme/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('new-theme/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('new-theme/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('new-theme/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('new-theme/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#fefefe',
                color: '#333',
                customClass: {
                    container: 'my-toast-container',
                },
            });
        @endif
    });
</script>


@if ($errors->any())
<script>
    window.onload = function() {
        @foreach ($errors->all() as $error)
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ $error }}",
            });
        @endforeach
    };
</script>
@endif

@if (session('success'))
<script>
    window.onload = function() {
        Swal.fire({
            icon: 'success',
            title: 'نجاح',
            text: "{{ session('success') }}",
        });
    };
</script>
@endif
<!--end::Javascript-->

@yield('js')
