@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Pasar</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <div class="d-flex gap-2 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Tambah Pasar
        </button>

        <button class="btn btn-secondary" onclick="window.open('{{ route('cetak-pasar') }}', '_blank')">
          <i class="fas fa-print"></i> Cetak Data
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/pasar" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="pasar" class="form-label">Nama Pasar</label>
                  <select name="pasar" required id="pasar" class="form-control">
                    <option value="" disabled selected>- Pilih Pasar -</option> <!-- Default option -->
                    <option value="Rejowinangun">Rejowinangun</option>
                    <option value="Kebonpolo">Kebonpolo</option>
                    <option value="Cacaban">Cacaban</option>
                    <option value="Sidomukti">Sidomukti</option>
                    <option value="Gotong Royong">Gotong Royong</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="koordinat" class="form-label">Koordinat</label>
                  <input type="text" required readonly class="form-control" name="koordinat" id="koordinat">
                </div>

                <div class="mb-3">
                  <div class='mb-3'>
                    <label for="kantor_pengelola" class="form-label">Kantor Pengelola</label>
                    <select name="kantor_pengelola" required id="kantor_pengelola" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="toilet" class="form-label">Toilet</label>
                    <select name="toilet" required id="toilet" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="pos_ukur_ulang" class="form-label">Pos Ukur Ulang</label>
                    <select name="pos_ukur_ulang" required id="pos_ukur_ulang" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="pos_keamanan" class="form-label">Pos Keamanan</label>
                    <select name="pos_keamanan" required id="pos_keamanan" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="ruang_menyusui" class="form-label">Ruang Menyusui</label>
                    <select name="ruang_menyusui" required id="ruang_menyusui" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="ruang_kesehatan" class="form-label">Ruang Kesehatan</label>
                    <select name="ruang_kesehatan" required id="ruang_kesehatan" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="ruang_peribadatan" class="form-label">Ruang Peribadatan</label>
                    <select name="ruang_peribadatan" required id="ruang_peribadatan" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="pemadam_kebakaran" class="form-label">Pemadam Kebakaran</label>
                    <select name="pemadam_kebakaran" required id="pemadam_kebakaran" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="tempat_parkir" class="form-label">Tempat Parkir</label>
                    <select name="tempat_parkir" required id="tempat_parkir" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="tps" class="form-label">TPS</label>
                    <select name="tps" id="tps" required class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>

                  </div>
                </div>

                <div class="mb-3">
                  <div class="mb-3">
                    <label for="pengolahan_air_limbah" class="form-label">Pos Ukur Ulang</label>
                    <select name="pengolahan_air_limbah" required id="pengolahan_air_limbah" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>

                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="air_bersih" class="form-label">Air Bersih</label>
                    <select name="air_bersih" required id="air_bersih" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="listrik" class="form-label">Listrik</label>
                    <select name="listrik" required id="listrik" class="form-control">

                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                  </div>
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
                  <th>Id Pasar</th>
                  <th>Pasar</th>
                  <th>Koordinat</th>
                  <th>Kantor Pengelola</th>
                  <th>Toilet</th>
                  <th>Pos Ukur Ulang</th>
                  <th>Pos keamanan</th>
                  <th>Ruang Menyusui</th>
                  <th>Ruang Kesehatan</th>
                  <th>Ruang Peribadatan</th>
                  <th>Pemadam Kebakaran</th>
                  <th>Tempat Parkir</th>
                  <th>TPS</th>
                  <th>Pengolahan Air Limbah</th>
                  <th>Air Bersih</th>
                  <th>Listrik</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($pasar as $data)
                <tr>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $data->pasar }}</td>
                  <td>{{ $data->koordinat }}</td>
                  <td>{{ $data->kantor_pengelola }}</td>
                  <td>{{ $data->toilet }}</td>
                  <td>{{ $data->pos_ukur_ulang }}</td>
                  <td>{{ $data->pos_keamanan }}</td>
                  <td>{{ $data->ruang_menyusui }}</td>
                  <td>{{ $data->ruang_kesehatan }}</td>
                  <td>{{ $data->ruang_peribadatan }}</td>
                  <td>{{ $data->pemadam_kebakaran }}</td>
                  <td>{{ $data->tempat_parkir }}</td>
                  <td>{{ $data->tps }}</td>
                  <td>{{ $data->pengolahan_air_limbah }}</td>
                  <td>{{ $data->air_bersih }}</td>
                  <td>{{ $data->listrik }}</td>
                  <td>
                    {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                    <div class="align-items-center">
                      <a href="{{ route('pasar.edit', $data->id_pasar) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form id="delete-form-{{ $data->id_pasar }}" action="/admin/pasar/{{ $data->id_pasar }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->id_pasar }})">
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
      , text: "Data yang sudah dihapus tidak bisa dikembalikan!"
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


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var pasarElement = document.getElementById('pasar');
    var koordinatElement = document.getElementById('koordinat');

    pasarElement.addEventListener('change', function() {
      var pasarValue = this.value;

      switch (pasarValue) {
        case 'Rejowinangun':
          koordinatElement.value = '-7.485679, 110.221897';
          koordinatElement.readOnly = true;
          break;
        case 'Kebonpolo':
          koordinatElement.value = '-7.463964, 110.223667';
          koordinatElement.readOnly = true;
          break;
        case 'Cacaban':
          koordinatElement.value = '-7.476743, 110.211544';
          koordinatElement.readOnly = true;
          break;
        case 'Sidomukti':
          koordinatElement.value = '-7.491176, 110.221396';
          koordinatElement.readOnly = true;
          break;
        case 'Gotong Royong':
          koordinatElement.value = '-7.493941, 110.224530';
          koordinatElement.readOnly = true;
          break;
        default:
          koordinatElement.value = '-';
          koordinatElement.readOnly = true;
          break;
      }
    });
  });

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
