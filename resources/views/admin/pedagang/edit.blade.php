@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Pedagang</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pedagang.update', $pedagang->id_pedagang) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pedagang</h1>
                            <a href="{{ url()->previous() }}" class="btn-close"></a>
                        </div>
                        <div class="modal-body">
                            <!-- Field input untuk pedagang -->
                            <div class="mb-3">
                                <label for="id_pedagang" class="form-label">ID Pedagang</label>
                                <input type="text" class="form-control" required name="id_pedagang" id="id_pedagang" value="{{ $pedagang->id_pedagang }}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            </div>
                            <!-- ID Lapak dengan pencarian -->
                            <div class="mb-3">
                                <label for="id_lapak" class="form-label">ID Lapak</label>
                                <input type="text" class="form-control" required name="id_lapak" id="id_lapak" value="{{ $pedagang->id_lapak }}">
                                <div id="lapak-list" class="list-group"></div> <!-- Container untuk hasil pencarian ID Lapak -->
                            </div>

                            <!-- NIK dengan pencarian -->
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                {{-- <input type="number" class="form-control" required name="nik" id="nik" value="{{ $pedagang->nik }}"> --}}
                                <input type="number" required class="form-control" name="nik" id="nik" value="{{ $pedagang->nik }}" maxlength="16" oninput="validateInput(this)">



                                <div id="nik-list" class="list-group"></div> <!-- Container untuk hasil pencarian NIK -->
                            </div>


                            <!-- IZIN dengan pencarian -->
                            <div class="mb-3">
                                <label for="izin" class="form-label">IZIN</label>
                                <input type="text" class="form-control" required name="izin" id="izin" value="{{ $pedagang->izin }}">
                                <div id="izin-list" class="list-group"></div> <!-- Container untuk hasil pencarian NIK -->
                            </div>
                            <!-- Jenis Dagang dengan pencarian -->
                            <div class="mb-3">
                                <label for="jenis_dagang" class="form-label">Jenis Dagang</label>
                                <input type="text" class="form-control" required name="jenis_dagang" id="jenis_dagang" value="{{ $pedagang->jenis_dagang }}">
                                <div id="jenis_dagang-list" class="list-group"></div> <!-- Container untuk hasil pencarian jenis_dagang -->
                            </div>


                            <!-- Check In -->
                            <div class="mb-3">
                                <label for="check_in" class="form-label">Check In</label>
                                <input type="date" required class="form-control" name="check_in" value="{{ $pedagang->check_in }}">
                            </div>

                            <!-- Check Out -->
                            <div class="mb-3">
                                <label for="check_out" class="form-label">Check Out</label>
                                <input type="date" required class="form-control" name="check_out" value="{{ $pedagang->check_out }}">
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" required id="status" class="form-control">
                                    <option value="Aktif" {{ $pedagang->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $pedagang->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <!-- VA -->
                            <div class="mb-3">
                                <label for="VA" class="form-label">VA</label>
                                <input type="number" required class="form-control" name="VA" value="{{ $pedagang->VA }}">
                            </div>

                            <!-- Penarik Retribusi -->
                            <div class="mb-3">
                                <label for="penarik_retribusi" class="form-label">Penarik Retribusi</label>
                                <select name="id_penarik_retribusi" required id="penarik_retribusi" class="form-control">
                                    <option value="" disabled>- Pilih Penarik -</option>
                                    @foreach ($penariks as $penarik)
                                    <option value="{{ $penarik->id_penarik_retribusi }}" {{ $pedagang->id_penarik_retribusi == $penarik->id_penarik_retribusi ? 'selected' : '' }}>
                                        {{ $penarik->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Footer modal -->
                            <div class="modal-footer">
                                <a href="{{ route('pedagang.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    var pasarElement = document.getElementById('pasar');
    var koordinatElement = document.getElementById('koordinat');

    pasarElement.addEventListener('change', function() {
      var pasarValue = this.value;

      switch (pasarValue) {
        case 'rejowinangun':
          koordinatElement.value = '-7.485679, 110.221897';
          koordinatElement.readOnly = true;
          break;
        case 'kebonpolo':
          koordinatElement.value = '-7.463964, 110.223667';
          koordinatElement.readOnly = true;
          break;
        case 'cacaban':
          koordinatElement.value = '-7.476743, 110.211544';
          koordinatElement.readOnly = true;
          break;
        case 'sidomukti':
          koordinatElement.value = '-7.491176, 110.221396';
          koordinatElement.readOnly = true;
          break;
        case 'gotongroyong':
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

</script> --}}
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // AJAX untuk pencarian ID Lapak
        $('#id_lapak').on('input', function() {
            var idLapak = $(this).val();
            if (idLapak.length >= 1) {
                $.ajax({
                    url: '/search-lapak'
                    , type: 'GET'
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
                $('#lapak-list').empty();
            }
        });

        // Event klik untuk mengisi input ID Lapak
        $(document).on('click', '.lapak-item', function(e) {
            e.preventDefault();
            var selectedLapak = $(this).data('id');
            $('#id_lapak').val(selectedLapak);
            $('#lapak-list').empty();
        });

        // AJAX untuk pencarian NIK
        $('#nik').on('input', function() {
            var nik = $(this).val();
            if (nik.length >= 3) {
                $.ajax({
                    url: '/search-nik'
                    , type: 'GET'
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
                $('#nik-list').empty();
            }
        });

        // Event klik untuk mengisi input NIK
        $(document).on('click', '.nik-item', function(e) {
            e.preventDefault();
            var selectedNik = $(this).data('nik');
            $('#nik').val(selectedNik);
            $('#nik-list').empty();
        });
    });

</script>
@endpush
<script>
    function validateInput(element) {
        const value = element.value;
        if (value.length > 16) {
            // Jika lebih dari 16 digit, ambil hanya 16 digit pertama
            element.value = value.slice(0, 16);

        }
    }

</script>
