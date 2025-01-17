@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <h1>Cetak Surat Izin</h1>
    </div>
    <form method="post" action="{{ route('import-excel') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Unggah File Excel</label>
            <input type="file" required class="form-control" name="file" id="file" accept=".xlsx, .xls">
        </div>
        <div class="mb-3">
            <input type="submit" value="Import Excel & Cetak" class="btn btn-success col-md-12">
        </div>
    </form>

    {{-- Tambahkan tombol untuk mengunduh semua file --}}
    @if(session('fileNames') && count(session('fileNames')) > 0)
    <div class="mb-3">
        <a href="{{ route('download-all') }}" class="btn btn-primary col-md-12">Unduh Semua Surat</a>
    </div>
    @else
    <div class="mb-3">
        <button class="btn btn-primary col-md-12" disabled>Unduh Semua Surat</button>
    </div>
    @endif

    <div class="car-body">
        <form method="post" action="{{ route('cetak-surat-print') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pasar" class="form-label">Pasar</label>
                        <select class="form-select" required name="pasar" id="pasar">
                            <option value="" disabled selected>- Pilih Pasar -</option>
                            <option value="Rejowinangun">Rejowinangun</option>
                            <option value="Cacaban">Cacaban</option>
                            <option value="Sidomukti">Sidomukti</option>
                            <option value="Gotong Royong">Gotong Royong</option>
                            <option value="Kebonpolo">Kebonpolo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Lapak</label>
                        <select class="form-select" required name="jenis" id="jenis">
                            <option value="" disabled selected>- Pilih Jenis Lapak -</option>
                            <option value="Los">Los</option>
                            <option value="Kios">Kios</option>
                            <option value="plataran">Plataran</option>
                            <option value="lesehan">Lesehan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_surat" class="form-label">No Surat</label>
                        <input type="text" required class="form-control" name="no_surat" id="no_surat" placeholder="Masukkan Nomor Surat">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" required class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Pedagang">
                    </div>

                    <div class="mb-3">
                        <label for="no_aturan" class="form-label">No Aturan</label>
                        <input type="text" required class="form-control" name="no_aturan" id="no_aturan" placeholder="Masukkan Nomor Perwal">
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Aturan</label>
                        <input type="text" required class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Perwal">
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" required class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" required class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" required class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" required name="alamat" id="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" required name="jenis_kelamin" id="jenis_kelamin">
                            <option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="warga_negara" class="form-label">Warga Negara</label>
                        <select class="form-select" required name="warga_negara" id="warga_negara">
                            <option value="" disabled selected>- Pilih Warga Negara -</option>
                            <option value="Laki-laki">Indonesia</option>
                            <option value="Perempuan">Asing</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon/HP</label>
                        <input type="text" required class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telepon/HP">
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" required class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan">
                    </div>

                    <div class="mb-3">
                        <label for="blok" class="form-label">Blok</label>
                        <input type="text" required class="form-control" name="blok" id="blok" placeholder="Masukkan Blok">
                    </div>

                    <div class="mb-3">
                        <label for="no_los" class="form-label">No Los/Kios</label>
                        <input type="text" required class="form-control" name="no_los" id="no_los" placeholder="Masukkan Nomor Los/Kios">
                    </div>

                    <div class="mb-3">
                        <label for="klasifikasi_klas" class="form-label">Klasifikasi Klas</label>
                        <input type="text" required class="form-control" name="klasifikasi_klas" id="klasifikasi_klas" placeholder="Masukkan Klasifikasi klas">
                    </div>

                    <div class="mb-3">
                        <label for="lantai" class="form-label">Lantai</label>
                        <input type="text" required class="form-control" name="lantai" id="lantai" placeholder="Masukkan Lantai">
                    </div>

                    <div class="mb-3">
                        <label for="ukuran" class="form-label">Ukuran</label>
                        <input type="text" required class="form-control" name="ukuran" id="ukuran" placeholder="Masukkan Ukuran Los/Kios">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_dagang" class="form-label">Jenis Dagangan</label>
                        <input type="text" required class="form-control" name="jenis_dagang" id="jenis_dagang" placeholder="Masukkan Jenis Dagang">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <input type="submit" value="Cetak" class="btn btn-primary col-md-12">
            </div>

        </form>
    </div>
</div>
@endsection
