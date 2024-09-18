@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Data Diri</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('data_diri.update', $dataDiri->nik) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Diri</h1>
              <a href="{{ url()->previous() }}" class="btn-close"></a>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pedagang -->

              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" required class="form-control" name="nama" value="{{ $dataDiri->nama }}">
              </div>

              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" required name="nik" id="nik" value="{{ $dataDiri->nik }}" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
              </div>

              <!-- Jenis Kelamin -->
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" required id="jenis_kelamin" class="form-control">
                  <option value="Laki-laki" {{ $dataDiri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="Perempuan" {{ $dataDiri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>

              <!-- Alamat -->
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <select name="kode_alamat" required id="alamat" class="form-control">
                  <option value="" disabled>- Pilih Alamat -</option>
                  @foreach ($alamats as $alamat)
                  <option value="{{ $alamat->kode_alamat }}" {{ $dataDiri->kode_alamat == $alamat->kode_alamat ? 'selected' : '' }}>
                    {{ $alamat->kab_kota }}, {{ $alamat->kecamatan }}, {{ $alamat->Kelurahan }}
                  </option>
                  @endforeach
                </select>
              </div>

              <!-- RT -->
              <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="number" required class="form-control" name="rt" id="rt" min="0" max="9999" value="{{ $dataDiri->rt }}" oninput="validateInput(this)">
              </div>

              <!-- RW -->
              <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="number" required class="form-control" name="rw" id="rw" min="0" max="9999" value="{{ $dataDiri->rw }}" oninput="validateInput(this)">
              </div>

              <!-- Footer modal -->
              <div class="modal-footer">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
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
