@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Pasar</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('pasar.update', $pasar->id_pasar) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pasar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Field input untuk pasar -->
              <div class="mb-3">
                <label for="pasar" class="form-label">Pasar</label>
                <input type="text" class="form-control" name="pasar" value="{{ old('pasar', $pasar->pasar) }}">
              </div>
              <!-- Field input untuk koordinat -->
              <div class="mb-3">
                <label for="koordinat" class="form-label">Koordinat</label>
                <input type="text" class="form-control" name="koordinat" value="{{ old('koordinat', $pasar->koordinat) }}">
              </div>

              <!-- Kantor Pengelola -->
              <div class="mb-3">
                <label for="kantor_pengelola" class="form-label">Kantor Pengelola</label>
                <select name="kantor_pengelola" id="kantor_pengelola" class="form-control">
                  <option value="Ada" {{ old('kantor_pengelola', $pasar->kantor_pengelola) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('kantor_pengelola', $pasar->kantor_pengelola) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Toilet -->
              <div class="mb-3">
                <label for="toilet" class="form-label">Toilet</label>
                <select name="toilet" id="toilet" class="form-control">
                  <option value="Ada" {{ old('toilet', $pasar->toilet) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('toilet', $pasar->toilet) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Pos Ukur Ulang -->
              <div class="mb-3">
                <label for="pos_ukur_ulang" class="form-label">Pos Ukur Ulang</label>
                <select name="pos_ukur_ulang" id="pos_ukur_ulang" class="form-control">
                  <option value="Ada" {{ old('pos_ukur_ulang', $pasar->pos_ukur_ulang) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('pos_ukur_ulang', $pasar->pos_ukur_ulang) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Pos Keamanan -->
              <div class="mb-3">
                <label for="pos_keamanan" class="form-label">Pos Keamanan</label>
                <select name="pos_keamanan" id="pos_keamanan" class="form-control">
                  <option value="Ada" {{ old('pos_keamanan', $pasar->pos_keamanan) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('pos_keamanan', $pasar->pos_keamanan) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Ruang Menyusui -->
              <div class="mb-3">
                <label for="ruang_menyusui" class="form-label">Ruang Menyusui</label>
                <select name="ruang_menyusui" id="ruang_menyusui" class="form-control">
                  <option value="Ada" {{ old('ruang_menyusui', $pasar->ruang_menyusui) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('ruang_menyusui', $pasar->ruang_menyusui) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Ruang Kesehatan -->
              <div class="mb-3">
                <label for="ruang_kesehatan" class="form-label">Ruang Kesehatan</label>
                <select name="ruang_kesehatan" id="ruang_kesehatan" class="form-control">
                  <option value="Ada" {{ old('ruang_kesehatan', $pasar->ruang_kesehatan) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('ruang_kesehatan', $pasar->ruang_kesehatan) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Ruang Peribadatan -->
              <div class="mb-3">
                <label for="ruang_peribadatan" class="form-label">Ruang Peribadatan</label>
                <select name="ruang_peribadatan" id="ruang_peribadatan" class="form-control">
                  <option value="Ada" {{ old('ruang_peribadatan', $pasar->ruang_peribadatan) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('ruang_peribadatan', $pasar->ruang_peribadatan) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Pemadam Kebakaran -->
              <div class="mb-3">
                <label for="pemadam_kebakaran" class="form-label">Pemadam Kebakaran</label>
                <select name="pemadam_kebakaran" id="pemadam_kebakaran" class="form-control">
                  <option value="Ada" {{ old('pemadam_kebakaran', $pasar->pemadam_kebakaran) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('pemadam_kebakaran', $pasar->pemadam_kebakaran) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Tempat Parkir -->
              <div class="mb-3">
                <label for="tempat_parkir" class="form-label">Tempat Parkir</label>
                <select name="tempat_parkir" id="tempat_parkir" class="form-control">
                  <option value="Ada" {{ old('tempat_parkir', $pasar->tempat_parkir) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('tempat_parkir', $pasar->tempat_parkir) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- TPS -->
              <div class="mb-3">
                <label for="tps" class="form-label">TPS</label>
                <select name="tps" id="tps" class="form-control">
                  <option value="Ada" {{ old('tps', $pasar->tps) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('tps', $pasar->tps) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Pengolahan Air Limbah -->
              <div class="mb-3">
                <label for="pengolahan_air_limbah" class="form-label">Pengolahan Air Limbah</label>
                <select name="pengolahan_air_limbah" id="pengolahan_air_limbah" class="form-control">
                  <option value="Ada" {{ old('pengolahan_air_limbah', $pasar->pengolahan_air_limbah) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('pengolahan_air_limbah', $pasar->pengolahan_air_limbah) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Air Bersih -->
              <div class="mb-3">
                <label for="air_bersih" class="form-label">Air Bersih</label>
                <select name="air_bersih" id="air_bersih" class="form-control">
                  <option value="Ada" {{ old('air_bersih', $pasar->air_bersih) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('air_bersih', $pasar->air_bersih) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Listrik -->
              <div class="mb-3">
                <label for="listrik" class="form-label">Listrik</label>
                <select name="listrik" id="listrik" class="form-control">
                  <option value="Ada" {{ old('listrik', $pasar->listrik) == 'Ada' ? 'selected' : '' }}>Ada</option>
                  <option value="Tidak Ada" {{ old('listrik', $pasar->listrik) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
              </div>

              <!-- Footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
