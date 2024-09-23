@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <h1>Print Data Pasar</h1>
    </div>
    <div class="car-body">
        <div class="input-group mb-3 d-flex align-items-center">
            <label for="label" class="form-label me-3 fw-bold text-dark">Nama Pasar</label>
            <input type="text" name="nmpasar" id="nmpasar" class="form-control">
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-secondary col-md-12"
                onclick="window.open('{{ route('cetak-data-perpasar', '') }}/' + document.getElementById('nmpasar').value, '_blank')">Cetak Laporan Perpasar <i class="fas fa-print"></i> </button>

        </div>
    </div>
</div>
@endsection

<!-- @push('js')
{{-- <script>
  $('#myTable').DataTable()

</script> --}}
<script>
    new DataTable('#myTable', {
        scrollX: true
    });
</script>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush -->