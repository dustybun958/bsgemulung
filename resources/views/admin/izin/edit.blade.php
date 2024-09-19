@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Izin</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('izin.update', $izin->id_izin) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Izin</h1>
              <a href="{{ url()->previous() }}" class="btn-close"></a>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pasar -->
              <div class="mb-3">
                <div class="mb-3">
                  <label for="id_izin" class="form-label">ID Izin</label>
                  <input type="text" class="form-control" required name="id_izin" id="id_izin" value="{{ $izin->id_izin }}">
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3">
                  <label for="id_pedagang" class="form-label">ID pedagang</label>
                  <input type="number" class="form-control" required name="id_pedagang" id="id_pedagang" value="{{ $izin->id_pedagang }}">
                  <div id="pedagang-list" class="list-group"></div> 
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3">
                  <label for="izin" class="form-label">Izin</label>
                  <input type="text" class="form-control" required name="izin" id="izin" value="{{ $izin->izin}}">
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