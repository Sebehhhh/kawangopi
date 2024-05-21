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

    function confirmDeleteKategoriProduk(event, url) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('delete-kategori-produk-form');
                form.action = url;
                form.submit();
            }
        });
    }

    function confirmDeleteUser(event, url) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('delete-user-form');
                form.action = url;
                form.submit();
            }
        });
    }

    $('#editKategoriProdukModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button yang memicu modal
        var id = button.data('id') // Extract info from data-* attributes
        var nama = button.data('nama')

        var modal = $(this)
        modal.find('.modal-body #edit-id').val(id)
        modal.find('.modal-body #edit-nama-kategori-produk').val(nama)
    })

    $('#editUserModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id'); // Ambil informasi dari atribut data-*
        var nama = button.data('nama');
        var email = button.data('email');
        var alamat = button.data('alamat');
        var telp = button.data('telp');
        var foto = button.data('foto');

        var modal = $(this);
        modal.find('.modal-body #edit-user-id').val(id);
        modal.find('.modal-body #edit-nama-user').val(nama);
        modal.find('.modal-body #edit-email').val(email);
        modal.find('.modal-body #edit-alamat').val(alamat);
        modal.find('.modal-body #edit-telp').val(telp);
        modal.find('.modal-body #edit-foto').val(foto);
    });
</script>
