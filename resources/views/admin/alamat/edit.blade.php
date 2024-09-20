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
                  <select name="kab_kota" id="kab_kota" class="form-control">
                    <option value="Kota Magelang" {{ old('kab_kota', $alamat->kab_kota) == 'Kota Magelang' ? 'selected' : '' }}>Kota Magelang</option>
                    <option value="Bukan Kota Magelang" {{ old('kab_kota', $alamat->kab_kota) == 'Bukan Kota Magelang' ? 'selected' : '' }}>Bukan Kota Magelang</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="kecamatan" class="form-label">Kecamatan</label>
                  <select name="kecamatan" id="kecamatan" class="form-control">
                    <option value="Magelang Utara" {{ old('kecamatan', $alamat->kecamatan) == 'Magelang Utara' ? 'selected' : '' }}>Magelang Utara</option>
                    <option value="Magelang Tengah" {{ old('kecamatan', $alamat->kecamatan) == 'Magelang Tengah' ? 'selected' : '' }}>Magelang Tengah</option>
                    <option value="Magelang Selatan" {{ old('kecamatan', $alamat->kecamatan) == 'Magelang Selatan' ? 'selected' : '' }}>Magelang Selatan</option>
                    <option value="Bukan Kota Magelang" {{ old('kecamatan', $alamat->kecamatan) == 'Bukan Kota Magelang' ? 'selected' : '' }}>Bukan Kota Magelang</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <div class="mb-3">
                  <label for="Kelurahan" class="form-label">Kelurahan</label>
                  <select name="Kelurahan" id="Kelurahan" class="form-control">
                    <option value="Kramat Utara" {{ old('Kelurahan', $alamat->Kelurahan) == 'Kramat Utara' ? 'selected' : '' }}>Kramat Utara</option>
                    <option value="Kramat Selatan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Kramat Selatan' ? 'selected' : '' }}>Kramat Selatan</option>
                    <option value="Potrobangsan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Potrobangsan' ? 'selected' : '' }}>Potrobangsan</option>
                    <option value="Kedungsari" {{ old('Kelurahan', $alamat->Kelurahan) == 'Kedungsari' ? 'selected' : '' }}>Kedungsari</option>
                    <option value="Wates" {{ old('Kelurahan', $alamat->Kelurahan) == 'Wates' ? 'selected' : '' }}>Wates</option>
                    <option value="Magelang" {{ old('Kelurahan', $alamat->Kelurahan) == 'Magelang' ? 'selected' : '' }}>Magelang</option>
                    <option value="Cacaban" {{ old('Kelurahan', $alamat->Kelurahan) == 'Cacaban' ? 'selected' : '' }}>Cacaban</option>
                    <option value="Kemirirejo" {{ old('Kelurahan', $alamat->Kelurahan) == 'Kemirirejo' ? 'selected' : '' }}>Kemirirejo</option>
                    <option value="Gelangan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Gelangan' ? 'selected' : '' }}>Gelangan</option>
                    <option value="Panjang" {{ old('Kelurahan', $alamat->Kelurahan) == 'Panjang' ? 'selected' : '' }}>Panjang</option>
                    <option value="Rejowinangun Utara" {{ old('Kelurahan', $alamat->Kelurahan) == 'Rejowinangun Utara' ? 'selected' : '' }}>Rejowinangun Utara</option>
                    <option value="Rejowinangun Selatan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Rejowinangun Selatan' ? 'selected' : '' }}>Rejowinangun Selatan</option>
                    <option value="Magersari" {{ old('Kelurahan', $alamat->Kelurahan) == 'Magersari' ? 'selected' : '' }}>Magersari</option>
                    <option value="Jurangombo Utara" {{ old('Kelurahan', $alamat->Kelurahan) == 'Jurangombo Utara' ? 'selected' : '' }}>Jurangombo Utara</option>
                    <option value="Jurangombo Selatan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Jurangombo Selatan' ? 'selected' : '' }}>Jurangombo Selatan</option>
                    <option value="Tidar Utara" {{ old('Kelurahan', $alamat->Kelurahan) == 'Tidar Utara' ? 'selected' : '' }}>Tidar Utara</option>
                    <option value="Tidar Selatan" {{ old('Kelurahan', $alamat->Kelurahan) == 'Tidar Selatan' ? 'selected' : '' }}>Tidar Selatan</option>
                    <option value="Bukan Kota Magelang" {{ old('Kelurahan', $alamat->Kelurahan) == 'Bukan Kota Magelang' ? 'selected' : '' }}>Bukan Kota Magelang</option>
                  </select>
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
