@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Sampah</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('sampah.update', $sampah->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="" class="form-label">Nama Warga</label>
              <input type="text" class="form-control" name="nama" value="{{ $sampah->nama }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Jenis Sampah</label>
              <select name="jenis_sampah" id="jenis_sampah" class="form-control">
                <option value="Botol" {{ $sampah->jenis_sampah == 'Botol' ? 'selected' : '' }}>Botol</option>
                <option value="Gelas" {{ $sampah->jenis_sampah == 'Gelas' ? 'selected' : '' }}>Gelas</option>
                <option value="Kardus" {{ $sampah->jenis_sampah == 'Kardus' ? 'selected' : '' }}>Kardus</option>
                <option value="Kaleng/Besi" {{ $sampah->jenis_sampah == 'Kaleng/Besi' ? 'selected' : '' }}>Kaleng/Besi</option>

                <option value="Atom" {{ $sampah->jenis_sampah == 'Atom' ? 'selected' : '' }}>Atom</option>
                <option value="Aluminium" {{ $sampah->jenis_sampah == 'Aluminium' ? 'selected' : '' }}>Aluminium</option>
                <option value="Adaptor" {{ $sampah->jenis_sampah == 'Adaptor' ? 'selected' : '' }}>Adaptor</option>
                <option value="Aki" {{ $sampah->jenis_sampah == 'Aki' ? 'selected' : '' }}>Aki</option>
                <option value="Beling" {{ $sampah->jenis_sampah == 'Beling' ? 'selected' : '' }}>Beling</option>
                <option value="Besi" {{ $sampah->jenis_sampah == 'Besi' ? 'selected' : '' }}>Besi</option>
                <option value="Botol" {{ $sampah->jenis_sampah == 'Botol' ? 'selected' : '' }}>Botol</option>
                <option value="Bagor" {{ $sampah->jenis_sampah == 'Bagor' ? 'selected' : '' }}>Bagor</option>
                <option value="Blek" {{ $sampah->jenis_sampah == 'Blek' ? 'selected' : '' }}>Blek</option>
                <option value="Ban" {{ $sampah->jenis_sampah == 'Ban' ? 'selected' : '' }}>Ban</option>
                <option value="Baterai" {{ $sampah->jenis_sampah == 'Baterai' ? 'selected' : '' }}>Baterai</option>
                <option value="CD" {{ $sampah->jenis_sampah == 'CD' ? 'selected' : '' }}>CD</option>
                <option value="Duplex" {{ $sampah->jenis_sampah == 'Duplex' ? 'selected' : '' }}>Duplex</option>
                <option value="Helm" {{ $sampah->jenis_sampah == 'Helm' ? 'selected' : '' }}>Helm</option>
                <option value="Kertas" {{ $sampah->jenis_sampah == 'Kertas' ? 'selected' : '' }}>Kertas</option>
                <option value="Kertas Buram" {{ $sampah->jenis_sampah == 'Kertas Buram' ? 'selected' : '' }}>Kertas Buram</option>
                <option value="kardus" {{ $sampah->jenis_sampah == 'kardus' ? 'selected' : '' }}>kardus</option>
                <option value="Kaleng" {{ $sampah->jenis_sampah == 'Kaleng' ? 'selected' : '' }}>Kaleng</option>
                <option value="Kabel" {{ $sampah->jenis_sampah == 'Kabel' ? 'selected' : '' }}>Kabel</option>
                <option value="Kain" {{ $sampah->jenis_sampah == 'Kain' ? 'selected' : '' }}>Kain</option>
                <option value="Kuningan" {{ $sampah->jenis_sampah == 'Kuningan' ? 'selected' : '' }}>Kuningan</option>
                <option value="Karet" {{ $sampah->jenis_sampah == 'Karet' ? 'selected' : '' }}>Karet</option>
                <option value="Karpet" {{ $sampah->jenis_sampah == 'Karpet' ? 'selected' : '' }}>Karpet</option>
                <option value="Kompor" {{ $sampah->jenis_sampah == 'Kompor' ? 'selected' : '' }}>Kompor</option>
                <option value="Lampu" {{ $sampah->jenis_sampah == 'Lampu' ? 'selected' : '' }}>Lampu</option>
                <option value="Mantol" {{ $sampah->jenis_sampah == 'Mantol' ? 'selected' : '' }}>Mantol</option>
                <option value="Magic com" {{ $sampah->jenis_sampah == 'Magic com' ? 'selected' : '' }}>Magic com</option>
                <option value="Monel" {{ $sampah->jenis_sampah == 'Monel' ? 'selected' : '' }}>Monel</option>
                <option value="Minyak" {{ $sampah->jenis_sampah == 'Minyak' ? 'selected' : '' }}>Minyak</option>
                <option value="Payung" {{ $sampah->jenis_sampah == 'Payung' ? 'selected' : '' }}>Payung</option>
                <option value="Plastik" {{ $sampah->jenis_sampah == 'Plastik' ? 'selected' : '' }}>Plastik</option>
                <option value="Sandal" {{ $sampah->jenis_sampah == 'Sandal' ? 'selected' : '' }}>Sandal</option>
                <option value="Seng" {{ $sampah->jenis_sampah == 'Seng' ? 'selected' : '' }}>Seng</option>
                <option value="Stainless" {{ $sampah->jenis_sampah == 'Stainless' ? 'selected' : '' }}>Stainless</option>
                <option value="Sak Semen" {{ $sampah->jenis_sampah == 'Sak Semen' ? 'selected' : '' }}>Sak Semen</option>
                <option value="Selang gas" {{ $sampah->jenis_sampah == 'Selang gas' ? 'selected' : '' }}>Selang gas</option>
                <option value="Obat nyamuk" {{ $sampah->jenis_sampah == 'Obat nyamuk' ? 'selected' : '' }}>Obat nyamuk</option>
                <option value="Viber" {{ $sampah->jenis_sampah == 'Viber' ? 'selected' : '' }}>Viber</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Berat</label>
              <input type="number" class="form-control" name="berat" value="{{ $sampah->berat }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Harga</label>
              <input type="text" class="form-control" name="harga" value="{{ $sampah->harga }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection