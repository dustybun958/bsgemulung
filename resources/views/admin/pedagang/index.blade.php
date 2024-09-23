@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Pedagang</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <div class="d-flex gap-2 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Tambah Pedagang
        </button>

        <button class="btn btn-secondary" onclick="window.open('{{ route('form-pedagang')}}','_blank')">
          <i class="fas fa-print"></i> Cetak Data
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/pedagang" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pedagang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="id_pedagang" class="form-label">ID Pedagang</label>
                    <input type="text" class="form-control" required name="id_pedagang" id="id_pedagang">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="id_lapak" class="form-label">ID Lapak</label>
                  <select name="id_lapak" required id="id_lapak" class="form-control">
                    <option value="" disabled selected>- Pilih ID Lapak -</option> <!-- Default option -->
                    @foreach ($lapaks as $lapak)
                    <option value="{{ $lapak->id_lapak }}">{{ $lapak->id_lapak }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <select name="nik" required id="nik" class="form-control">
                    <option value="" disabled selected>- Pilih NIK -</option> <!-- Default option -->
                    @foreach ($dataDiris as $data_diri)
                    <option value="{{ $data_diri->nik }}">{{ $data_diri->nik }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="check_in" class="form-label">Check In</label>
                    <input type="date" required class="form-control" name="check_in">
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="check_out" class="form-label">Check Out</label>
                    <input type="date" required class="form-control" name="check_out">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" required id="status" class="form-control">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="VA" class="form-label">VA</label>
                    <input type="number" required class="form-control" name="VA">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="penarik_retribusi" class="form-label">Penarik Retribusi</label>
                  <select name="id_penarik_retribusi" required id="penarik_retribusi" class="form-control">
                    <option value="" disabled selected>- Pilih Penarik -</option> <!-- Default option -->
                    @foreach ($penariks as $penarik)
                    <option value="{{ $penarik->id_penarik_retribusi }}">{{ $penarik->nama }}</option>
                    @endforeach
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
                  <th class="text-start">Id Pedagang</th>
                  <th class="text-start">Id Lapak</th>
                  <th class="text-start">NIK</th>
                  <th class="text-start">Check In</th>
                  <th class="text-start">Check Out</th>
                  <th class="text-start">Status</th>
                  <th class="text-start">VA</th>
                  <th class="text-start">Penarik Retribusi</th>
                  <th class="text-start">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($pedagang as $data)
                <tr>
                  <td class="text-start">{{$loop->iteration}}</td>
                  <td class="text-start">{{$data->id_pedagang}}</td>
                  <td class="text-start">{{$data->id_lapak}}</td>
                  <td class="text-start">{{$data->nik}}</td>
                  <td class="text-start">{{$data->check_in}}</td>
                  <td class="text-start">{{$data->check_out}}</td>
                  <td class="text-start">
                    <span class="badge {{ $data->status == 'Aktif' ? 'bg-success' : 'bg-danger' }} text-white p-2" style="border-radius: 5px; font-size: 14px; min-width: 100px; text-align: center;"">

                      {{ $data->status }}
                    </span>
                  </td>
                  <td class=" text-start">{{$data->VA}}</td>
                  <td class="text-start">{{$data->penarikRetribusi->nama}}</td>
                  <td class="text-start">
                    {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                    <div class="align-items-center">
                      <a href="{{ route('pedagang.edit', $data->id_pedagang) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form id="delete-form-{{ $data->id_pedagang }}" action="/admin/pedagang/{{ $data->id_pedagang }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->id_pedagang }})">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </form>

                    </div>


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
  function validateInput(element) {
    const value = element.value;
    if (value.length > 4) {
      element.value = value.slice(0, 4);
    }
  }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#nik').on('input', function() {
      var nik = $(this).val();
      if (nik.length >= 3) { // Mulai pencarian setelah 3 karakter
        $.ajax({
          url: '/search-nik', // Route untuk search
          type: 'GET'
          , data: {
            nik: nik
          }
          , success: function(data) {
            $('#nik-list').empty();
            if (data.length > 0) {
              $.each(data, function(index, item) {
                $('#nik-list').append('<a href="#" class="list-group-item list-group-item-action nik-item" data-nik="' + item.nik + '">' + item.nik + ' - ' + item.nama + '</a>');
              });
            } else {
              $('#nik-list').append('<a href="#" class="list-group-item list-group-item-action disabled">NIK tidak ditemukan</a>');
            }
          }
        });
      } else {
        $('#nik-list').empty(); // Kosongkan jika input kurang dari 3 karakter
      }
    });

    // Event klik untuk mengisi input NIK
    $(document).on('click', '.nik-item', function(e) {
      e.preventDefault();
      var selectedNik = $(this).data('nik');
      $('#nik').val(selectedNik);
      $('#nik-list').empty(); // Kosongkan list setelah memilih
    });
  });

</script>
<script type="text/javascript">
  $(document).ready(function() {
    // AJAX untuk pencarian ID Lapak
    $('#id_lapak').on('input', function() {
      var idLapak = $(this).val();
      if (idLapak.length >= 1) { // Mulai pencarian setelah 1 karakter
        $.ajax({
          url: '/search-lapak', // Route untuk search lapak
          type: 'GET'
          , data: {
            id_lapak: idLapak
          }
          , success: function(data) {
            $('#lapak-list').empty();
            if (data.length > 0) {
              $.each(data, function(index, item) {
                $('#lapak-list').append('<a href="#" class="list-group-item list-group-item-action lapak-item" data-id="' + item.id_lapak + '">' + item.id_lapak + ' - ' + item.nama_pasar + '</a>');
              });
            } else {
              $('#lapak-list').append('<a href="#" class="list-group-item list-group-item-action disabled">ID Lapak tidak ditemukan</a>');
            }
          }
        });
      } else {
        $('#lapak-list').empty(); // Kosongkan jika input kurang dari 1 karakter
      }
    });

    // Event klik untuk mengisi input ID Lapak
    $(document).on('click', '.lapak-item', function(e) {
      e.preventDefault();
      var selectedLapak = $(this).data('id');
      $('#id_lapak').val(selectedLapak);
      $('#lapak-list').empty(); // Kosongkan list setelah memilih
    });
  });

</script>
