@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Lapak</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('lapak.update', $lapak->id_lapak) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lapak</h1>
              <a href="{{ url()->previous() }}" class="btn-close"></a>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pedagang -->

              <div class="mb-3">
                <label for="id_lapak" class="form-label">ID Lapak</label>
                <input type="text" required class="form-control" name="id_lapak" value="{{ $lapak->id_lapak }}">
              </div>

              <div class="mb-3">
                <label for="pasar" class="form-label">Nama Pasar</label>
                <select name="id_pasar" required id="pasar" class="form-control">
                  @foreach ($pasars as $pasar)
                  <option value="{{ $pasar->id_pasar }}" {{ $lapak->id_pasar == $pasar->id_pasar ? 'selected' : '' }}>
                    {{ $pasar->pasar }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" id="jenis" class="form-control">
                  <option value="los" {{ $lapak->jenis == 'los' ? 'selected' : '' }}>Los</option>
                  <option value="kios" {{ $lapak->jenis == 'kios' ? 'selected' : '' }}>Kios</option>
                </select>
              </div>


              <div class="mb-3">
                <label for="lantai" class="form-label">Lantai</label>
                <select name="lantai" id="lantai" class="form-control">
                  <option value="1" {{ $lapak->lantai == 1 ? 'selected' : '' }}>1</option>
                  <option value="2" {{ $lapak->lantai == 2 ? 'selected' : '' }}>2</option>
                  <option value="3" {{ $lapak->lantai == 3 ? 'selected' : '' }}>3</option>
                  <option value="4" {{ $lapak->lantai == 4 ? 'selected' : '' }}>4</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="blok" class="form-label">Blok</label>
                <select name="blok" id="blok" class="form-control">
                  @foreach (range('A', 'K') as $letter)
                  <option value="{{ $letter }}" {{ $lapak->blok == $letter ? 'selected' : '' }}>{{ $letter }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="zonasi" class="form-label">Zonasi</label>
                <select name="zonasi" id="zonasi" class="form-control">
                  <option value="Sayur" {{ $lapak->zonasi == 'Sayur' ? 'selected' : '' }}>Sayur</option>
                  <option value="Daging" {{ $lapak->zonasi == 'Daging' ? 'selected' : '' }}>Daging</option>
                  <option value="Pakaian" {{ $lapak->zonasi == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                  <option value="Sepatu" {{ $lapak->zonasi == 'Sepatu' ? 'selected' : '' }}>Sepatu</option>
                  <option value="Bumbu Dapur" {{ $lapak->zonasi == 'Bumbu Dapur' ? 'selected' : '' }}>Bumbu Dapur</option>
                  <option value="Kuliner" {{ $lapak->zonasi == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                  <option value="Sembako" {{ $lapak->zonasi == 'Sembako' ? 'selected' : '' }}>Sembako</option>
                  <option value="Elektronik" {{ $lapak->zonasi == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="no" class="form-label">No</label>
                <input type="text" class="form-control" name="no" value="{{ $lapak->no }}">
              </div>

              <div class="mb-3">
                <label for="hadap" class="form-label">Hadap</label>
                <select name="hadap" id="hadap" class="form-control">
                  <option value="Utara" {{ $lapak->hadap == 'Utara' ? 'selected' : '' }}>Utara</option>
                  <option value="Selatan" {{ $lapak->hadap == 'Selatan' ? 'selected' : '' }}>Selatan</option>
                  <option value="Timur" {{ $lapak->hadap == 'Timur' ? 'selected' : '' }}>Timur</option>
                  <option value="Barat" {{ $lapak->hadap == 'Barat' ? 'selected' : '' }}>Barat</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="luas" class="form-label">Luas</label>
                <input type="text" class="form-control" name="luas" value="{{ $lapak->luas }}">
              </div>


              <div class="mb-3">
                <label for="tarif_dasar" class="form-label">Tarif Dasar</label>
                <input type="text" class="form-control" name="tarif_dasar" value="{{ $lapak->tarif_dasar }}">
              </div>

              <div class="mb-3">
                <label for="status_lapak" class="form-label">Status Lapak</label>
                <select name="status_lapak" id="status_lapak" class="form-control">
                  <option value="Kosong" {{ $lapak->status_lapak == 'Kosong' ? 'selected' : '' }}>Kosong</option>
                  <option value="Isi" {{ $lapak->status_lapak == 'Isi' ? 'selected' : '' }}>Isi</option>
                  <option value="Telat bayar" {{ $lapak->status_lapak == 'Telat bayar' ? 'selected' : '' }}>Telat bayar</option>
                </select>
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
