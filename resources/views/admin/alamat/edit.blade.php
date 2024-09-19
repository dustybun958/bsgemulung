@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Alamat</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('alamat.update', $alamat->kode_alamat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Alamat</h1>
              <a href="{{ url()->previous() }}" class="btn-close"></a>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pasar -->
              <div class="mb-3">
                <div class="mb-3">
                  <label for="kode_alamat" class="form-label">Kode Alamat</label>
                  <input type="text" class="form-control" required name="kode_alamat" id="kode_alamat" value="{{ $alamat->kode_alamat }}">
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="kab_kota" class="form-label">Kabupaten/Kota</label>
                  <input type="text" class="form-control" required name="kab_kota" id="kab_kota" value="{{ $alamat->kab_kota }}">
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="kecamatan" class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" required name="kecamatan" id="kecamatan" value="{{ $alamat->kecamatan }}">
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="Kelurahan" class="form-label">Kelurahan</label>
                  <input type="text" class="form-control" required name="Kelurahan" id="Kelurahan" value="{{ $alamat->Kelurahan }}">
                </div>
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
