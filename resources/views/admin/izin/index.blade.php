@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Izin</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <div class="d-flex gap-2 mb-3">
        <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Tambah Izin
        </button>

        <button
          class="btn btn-secondary"
          onclick="window.open('{{ route('form-izin') }}', '_blank')">
          <i class="fas fa-print"></i> Cetak Data
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/izin" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Izin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="id_izin" class="form-label">ID Izin</label>
                    <input type="text" class="form-control" required name="id_izin" id="id_izin">
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="pedagang" class="form-label">ID Pedagang</label>
                    <select name="id_pedagang" required id="pedagang" class="form-control">
                      <!-- Default option -->
                      @foreach ($pedagang as $pedagang)
                      <option value="{{ $pedagang->id_pedagang }}">{{ $pedagang->id_pedagang }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="izin" class="form-label">Izin</label>
                    {{-- <input type="text" class="form-control" name="izin"> --}}
                    <select name="izin" required id="izin" class="form-control">
                      <option value="" disabled selected>- Pilih Izin -</option> <!-- Default option -->
                      <option value="niB">niB</option>
                      <option value="SKP">SKP</option>
                      <option value="SKTU">SKTU</option>
                    </select>
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
                  <th>No</th>
                  <th>Id Izin</th>
                  <th>Id Pedangang</th>
                  <th>Izin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($izin as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->id_izin}}</td>
                  <td>{{ $data->id_pedagang }}</td>
                  <td>{{ $data->izin }}</td>

                  <td>
                    {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                    <div class="align-items-center">
                      <a href="{{ route('izin.edit', $data->id_izin) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form id="delete-form-{{ $data->id_izin }}" action="/admin/izin/{{ $data->id_izin }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->id_izin }})">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </form>
                    </div>

                    {{-- <a data-confirm-delete="true" href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a> --}}

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
{{-- <script>
  $('#myTable').DataTable()

</script> --}}
<script>
  new DataTable('#myTable', {
    scrollX: true
  });
</script>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }
</script>
@endpush