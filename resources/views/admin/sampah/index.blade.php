@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Sampah</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Sampah
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/sampah" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sampah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="" class="form-label">Nama Warga</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <label for="" class="form-label">Jenis Sampah</label>
                  <select name="jenis_sampah" id="jenis_sampah" class="form-control">
                    <option value="Atom">Atom</option>
                    <option value="Aluminium">Aluminium</option>
                    <option value="Adaptor">Adaptor</option>
                    <option value="Aki">Aki</option>
                    <option value="Beling">Beling</option>
                    <option value="Besi">Besi</option>
                    <option value="Botol">Botol</option>
                    <option value="Bagor">Bagor</option>
                    <option value="Blek">Blek</option>
                    <option value="Ban">Ban</option>
                    <option value="Baterai">Baterai</option>
                    <option value="CD">CD</option>
                    <option value="Duplex">Duplex</option>
                    <option value="Helm">Helm</option>
                    <option value="Kertas">Kertas</option>
                    <option value="Kertas Buram">Kertas Buram</option>
                    <option value="kardus">kardus</option>
                    <option value="Kaleng">Kaleng</option>
                    <option value="Kabel">Kabel</option>
                    <option value="Kain">Kain</option>
                    <option value="Kuningan">Kuningan</option>
                    <option value="Karet">Karet</option>
                    <option value="Karpet">Karpet</option>
                    <option value="Kompor">Kompor</option>
                    <option value="Lampu">Lampu</option>
                    <option value="Mantol">Mantol</option>
                    <option value="Magic com">Magic com</option>
                    <option value="Monel">Monel</option>
                    <option value="Minyak">Minyak</option>
                    <option value="Payung">Payung</option>
                    <option value="Plastik">Plastik</option>
                    <option value="Sandal">Sandal</option>
                    <option value="Seng">Seng</option>
                    <option value="Stainless">Stainless</option>
                    <option value="Sak Semen">Sak Semen</option>
                    <option value="Selang gas">Selang gas</option>
                    <option value="Obat nyamuk">Obat nyamuk</option>
                    <option value="Viber">Viber</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Berat</label>
                  <input type="text" class="form-control" name="berat">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Harga</label>
                  <input type="text" class="form-control" name="harga">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover" id="myTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Nama Warga</th>
                  <th>Jenis Sampah</th>
                  <th>Berat</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($sampah as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->created_at->format('d M Y') }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->jenis_sampah }}</td>
                  <td>{{ $data->berat }}</td>
                  <td>{{ $data->harga }}</td>
                  <td>
                    <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a data-confirm-delete="true" href="/admin/sampah/{{ $data->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $('#myTable').DataTable()

</script>
@endpush
