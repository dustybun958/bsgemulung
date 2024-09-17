@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Penarik Retribusi</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('penarik_retribusi.update', $penarik_retribusi->id_penarik_retribusi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Penarik Restribusi</h1>
              <a href="{{ url()->previous() }}" class="btn-close"></a>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pasar -->
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama', $penarik_retribusi->nama) }}">

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
