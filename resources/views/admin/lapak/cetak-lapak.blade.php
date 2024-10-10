@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <h1>Print Data Lapak Perpasar</h1>
        </div>
        <div class="car-body">
            <div class="input-group mb-3 d-flex align-items-center">
                <label for="nmpasar" class="form-label me-3 fw-bold text-dark">Nama Pasar</label>
                <select name="nmpasar" required id="nmpasar" class="form-control">
                    <option value="" disabled selected>- Pilih Pasar -</option> <!-- Default option -->
                    <option value="Rejowinangun">Rejowinangun</option>
                    <option value="Kebonpolo">Kebonpolo</option>
                    <option value="Cacaban">Cacaban</option>
                    <option value="Sidomukti">Sidomukti</option>
                    <option value="Gotong Royong">Gotong Royong</option>
                </select>
            </div>
            <div class="input-group mb-3 d-flex align-items-center">
                <label for="status_lapak" class="form-label me-3 fw-bold text-dark">Status Lapak</label>
                <select name="status_lapak" id="status_lapak" class="form-control">
                    <option value="" disabled selected>- Pilih Status Lapak -</option>
                    <option value="Kosong">Kosong</option>
                    <option value="Isi">Isi</option>
                    <option value="Telat bayar">Telat bayar</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <button type="button" class="btn btn-secondary col-md-12" onclick="cetakLaporanLapak()">Cetak Laporan Lapak
                    Perpasar <i class="fas fa-print"></i>
                </button>
            </div>
        </div>
    </div>
    <script>
        function cetakLaporanLapak() {
            const nmpasar = document.getElementById('nmpasar').value;
            const statusLapak = document.getElementById('status_lapak').value;

            if (nmpasar && statusLapak) {
                const url = `/cetak-data-lapak/${nmpasar}/${statusLapak}`;
                window.open(url, '_blank');
            } else {
                alert('Silakan pilih Nama Pasar dan Status Lapak terlebih dahulu.');
            }
        }
    </script>
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
