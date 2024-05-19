<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/dashboard/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/dashboard/assets/js/dashboards-analytics.js') }}"></script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@if (session()->has('alert'))
    <script>
        Swal.fire({
            icon: '{{ session('alert.type') }}',
            title: '{{ session('alert.title') }}',
            text: '{{ session('alert.message') }}',
        });
    </script>
@endif

<script>
    function confirmLogout(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
