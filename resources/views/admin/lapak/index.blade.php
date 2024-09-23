@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Lapak</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <div class="d-flex gap-2 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Tambah Lapak
        </button>

        <button class="btn btn-secondary" onclick="window.open('{{ route('form-lapak') }}', '_blank')">
          <i class="fas fa-print"></i> Cetak Data
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/lapak" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Lapak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="id_lapak" class="form-label">ID Lapak</label>
                    <input type="number" required class="form-control" name="id_lapak" id="id_lapak" min="0" max="99999" oninput="validateInput(this)">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="pasar" class="form-label">Nama Pasar</label>
                  <select name="id_pasar" required id="pasar" class="form-control">
                    <option value="" disabled selected>- Pilih Pasar -</option> <!-- Default option -->
                    @foreach ($pasars as $pasar)
                    <option value="{{ $pasar->id_pasar }}">{{ $pasar->pasar }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select name="jenis" id="jenis" class="form-control">
                      <option value="los">Los</option>
                      <option value="kios">Kios</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="mb-3">
                    <label for="lantai" class="form-label">Lantai</label>
                    <select name="lantai" id="lantai" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="3">4</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="blok" class="form-label">Blok</label>
                    <select name="blok" id="blok" class="form-control">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                      <option value="G">G</option>
                      <option value="H">H</option>
                      <option value="I">I</option>
                      <option value="J">J</option>
                      <option value="K">K</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="zonasi" class="form-label">Zonasi</label>
                  <select name="zonasi" id="zonasi" class="form-control">
                    <option value="Sayur">Sayur</option>
                    <option value="Daging">Daging</option>
                    <option value="pakian">Pakai</option>
                    <option value="Sepatu">Sepatu</option>
                    <option value="Bumbu Dapur">Bumbu Dapur</option>
                    <option value="Kuliner">Kuliner</option>
                    <option value="Sembako">Sembako</option>
                    <option value="Elektronik">Elektronik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="number" class="form-control" name="no" id="no" min="0" max="99999" oninput="validateInput(this)">

                  </div>
                </div>
                <div class="mb-3">
                  <label for="hadap" class="form-label">Hadap</label>
                  <select name="hadap" id="hadap" class="form-control">
                    <option value="Utara">Utara</option>
                    <option value="Selatan">Selatan</option>
                    <option value="Timur">Timur</option>
                    <option value="Barat">Barat</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="luas" class="form-label">Luas</label>
                    <input type="number" class="form-control" name="luas" id="luas" min="0" max="99999" oninput="validateInput(this)">
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="tarif_dasar" class="form-label">Tarif Dasar</label>
                    <input type="number" class="form-control" name="tarif_dasar" id="tarif_dasar" min="0">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="status_lapak" class="form-label">Status Lapak</label>
                  <select name="status_lapak" id="status lapak" class="form-control">
                    <option value="Kosong">Kosong</option>
                    <option value="Isi">Isi</option>
                    <option value="Telat bayar">Telat bayar</option>
                  </select>
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
                  <th class="text-start">No</th>
                  <th class="text-start">Id Lapak</th>
                  <th class="text-start">Nama Pasar</th>
                  <th class="text-start">Jenis</th>
                  <th class="text-start">Lantai</th>
                  <th class="text-start">Blok</th>
                  <th class="text-start">Zonasi</th>
                  <th class="text-start">No</th>
                  <th class="text-start">Hadap</th>
                  <th class="text-start">Luas</th>
                  <th class="text-start">Tarif Dasar</th>
                  <th class="text-start">Status Lapak</th>
                  <th class="text-start">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($lapaks as $data)
                <tr>
                  <td class="text-start">{{ $loop->iteration }}</td>
                  <td class="text-start">{{ $data->id_lapak }}</td>
                  <td class="text-start">{{ $data->pasar->pasar }}</td>
                  <td class="text-start">{{ $data->jenis }}</td>
                  <td class="text-start">{{ $data->lantai }}</td>
                  <td class="text-start">{{ $data->blok }}</td>
                  <td class="text-start">{{ $data->zonasi }}</td>
                  <td class="text-start">{{ $data->no }}</td>
                  <td class="text-start">{{ $data->hadap }}</td>
                  <td class="text-start">{{ $data->luas }}</td>
                  <td class="text-start">{{ $data->tarif_dasar }}</td>
                  <td class="text-start">
                    <span class="badge 
    {{ $data->status_lapak == 'Kosong' ? 'bg-danger' : '' }}
    {{ $data->status_lapak == 'Isi' ? 'bg-success' : '' }}
    {{ $data->status_lapak == 'Telat Bayar' ? 'bg-warning' : '' }}
    text-white p-2" style="border-radius: 10px; font-size: 14px; min-width: 80px; text-align: center;">
                      {{ $data->status_lapak }}
                    </span>
                  </td>

                  <td class="text-start">
                    {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                    <div class="align-items-center">
                      <a href="{{ route('lapak.edit', $data->id_lapak) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form id="delete-form-{{ $data->id_lapak }}" action="/admin/lapak/{{ $data->id_lapak }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->id_lapak }})">
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
    if (value.length > 5) {
      element.value = value.slice(0, 5);
    }
  }

</script>
