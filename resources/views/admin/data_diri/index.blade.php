@extends('layouts.app')

@section('content')


<style>


</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Data Diri</h4>

    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <div class="d-flex gap-2 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Data Diri
                </button>

                <button class="btn btn-secondary" onclick="window.open('{{ route('form-diri') }}', '_blank')">
                    <i class="fas fa-print"></i> Cetak Data
                </button>

                <button type="button" class="btn btn-excel" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fas fa-file-excel"></i> Import Data
                </button>
            </div>
            <!-- Modal -->

            <!-- Modal untuk upload Excel -->
            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('data_diri.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Import Data Diri dari Excel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Pilih File Excel</label>
                                    <input type="file" name="file" class="form-control" accept=".xlsx, .xls" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            {{-- start modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/data_diri" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Diri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" required class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" required name="nik" id="nik" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" required id="jenis_kelamin" class="form-control">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <select name="kode_alamat" required id="alamat" class="form-control">
                                        <option value="" disabled selected>- Pilih Alamat -</option> <!-- Default option -->
                                        @foreach ($alamats as $alamat)
                                        <option value="{{ $alamat->kode_alamat }}">{{ $alamat->kab_kota }}, {{$alamat->kecamatan}}, {{$alamat->Kelurahan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="rt" class="form-label">RT</label>
                                        <input type="number" required class="form-control" name="rt" id="rt" min="0" max="9999" oninput="validateInput(this)">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="rw" class="form-label">RW</label>
                                        <input type="number" required class="form-control" name="rw" id="rw" min="0" max="9999" oninput="validateInput(this)">
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
            {{-- end modal --}}
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-start">No</th>
                                    <th class="text-start">Nama</th>
                                    <th class="text-start">NIK</th>
                                    <th class="text-start">Jenis Kelamin</th>
                                    <th class="text-start">Alamat</th>
                                    <th class="text-start">RT</th>
                                    <th class="text-start">RW</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($dataDiri as $data)
                                <tr>
                                    <td class="text-start">{{ $loop->iteration }}</td>
                                    <td class="text-start">{{ $data->nama }}</td>
                                    <td class="text-start">{{ $data->nik }}</td>
                                    <td class="text-start">{{ $data->jenis_kelamin }}</td>
                                    <td class="text-start">{{ $data->alamat->kab_kota}}, {{$data->alamat->kecamatan}}, {{$data->alamat->Kelurahan}}</td>
                                    <td class="text-start">{{ $data->rt }}</td>
                                    <td class="text-start">{{ $data->rw }}</td>
                                    <td class="text-start">
                                        {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                                        <div class="align-items-center">
                                            <a href="{{ route('data_diri.edit', $data->nik) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form id="delete-form-{{ $data->nik }}" action="/admin/data_diri/{{ $data->nik }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->nik }})">
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
    function confirmDelete(nik) {
        Swal.fire({
            title: 'Yakin ingin menghapus?'
            , text: "Data yang sudah dihapus tidak bisa dikembalikan!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + nik).submit();
            }
        });
    }

</script>
@endpush

<script>
    function validateInput(element) {
        const value = element.value;
        if (value.length > 4) {
            element.value = value.slice(0, 4);
        }
    }

</script>
