<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500,
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>

<!-- SweetAlert untuk tombol delete -->
<script>
    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('delete-btn')) {
            var id = event.target.dataset.id; // Ambil ID dari tombol
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form berdasarkan ID
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    });
</script>
