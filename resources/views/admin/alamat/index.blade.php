@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Alamat</h4>

    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <div class="d-flex gap-2 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Alamat
                </button>

                <button class="btn btn-secondary" onclick="window.open('{{ route('form-alamat') }}', '_blank')">
                    <i class="fas fa-print"></i> Cetak Data
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/alamat" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Alamat</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="kode_alamat" class="form-label">Kode Alamat</label>
                                        <input type="text" class="form-control" name="kode_alamat" placeholder="Masukkan Kode Alamat">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kab_kota" class="form-label">Kab/Kota</label>
                                    <select name="kab_kota" required id="kab_kota" class="form-control">
                                        <option value="" disabled selected>- Pilih Kab/Kota -</option>
                                        <option value="Kota Magelang">Kota Magelang</option>
                                        <option value="Bukan Kota Magelang">Bukan Kota Magelang</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select name="kecamatan" required id="kecamatan" class="form-control">
                                        <option value="" disabled selected>- Pilih Kecamatan -</option>
                                        <option value="Magelang Utara">Magelang Utara</option>
                                        <option value="Magelang Tengah">Magelang Tengah</option>
                                        <option value="Magelang Selatan">Magelang Selatan</option>
                                        <option value="Bukan Kota Magelang">Bukan Kota Magelang</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="Kelurahan" class="form-label">Kelurahan</label>
                                        <select name="Kelurahan" required id="Kelurahan" class="form-control">
                                            <option value="" disabled selected>- Pilih Kelurahan -</option>
                                            <option value="Kramat Utara">Kramat Utara</option>
                                            <option value="Kramat Selatan">Kramat Selatan</option>
                                            <option value="Potrobangsan">Potrobangsan</option>
                                            <option value="Kedungsari">Kedungsari</option>
                                            <option value="Wates">Wates</option>
                                            <option value="Magelang">Magelang</option>
                                            <option value="Cacaban">Cacaban</option>
                                            <option value="Kemirirejo">Kemirirejo</option>
                                            <option value="Gelangan">Gelangan</option>
                                            <option value="Panjang">Panjang</option>
                                            <option value="Rejowinangun Utara">Rejowinangun Utara</option>
                                            <option value="Rejowinangun Selatan">Rejowinangun Selatan</option>
                                            <option value="Magersari">Magersari</option>
                                            <option value="Jurangombo Utara">Jurangombo Utara</option>
                                            <option value="Jurangombo Selatan">Jurangombo Selatan</option>
                                            <option value="Tidar Utara">Tidar Utara</option>
                                            <option value="Tidar Selatan">Tidar Selatan</option>
                                            <option value="Bukan Kota Magelang">Bukan Kota Magelang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID Alamat</th>
                                    <th>Kode Alamat</th>
                                    <th>Kab/Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($alamat as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kode_alamat }}</td>
                                    <td>{{ $data->kab_kota }}</td>
                                    <td>{{ $data->kecamatan }}</td>
                                    <td>{{ $data->Kelurahan }}</td>

                                    <td>
                                        {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                                        <div class="align-items-center">
                                            <a href="{{ route('alamat.edit', $data->	kode_alamat) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form id="delete-form-{{ $data->	kode_alamat }}" action="/admin/alamat/{{ $data->	kode_alamat }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->	kode_alamat }})">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>

                                        {{-- <a data-confirm-delete="true" href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a> --}}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
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
            title: 'Yakin ingin menghapus?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

</script>
@endpush
