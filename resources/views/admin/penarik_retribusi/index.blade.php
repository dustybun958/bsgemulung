@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Penarik Retribusi</h4>

  <div class="row">
    <div class="col-md-12">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Penarik Retribusi
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="/admin/penarik_retribusi" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penarik Retribusi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
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
                  <th>Id Penarik Retribusi</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($penarik_retribusi as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama }}</td>

                  <td>
                    {{-- <a href="{{ route('sampah.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a> --}}
                    <div class="d-flex justify-content-between align-items-center">
                      <a href="{{ route('penarik_retribusi.edit', $data->	id_penarik_retribusi) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form id="delete-form-{{ $data->	id_penarik_retribusi }}" action="/admin/penarik_retribusi/{{ $data->	id_penarik_retribusi }}" method="POST" class="d-inline-flex align-items-center m-0 p-0 ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $data->	id_penarik_retribusi }})">
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
<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus?'
      , text: "You won't be able to revert this!"
      , icon: 'warning'
      , showCancelButton: true
      , confirmButtonColor: '#3085d6'
      , cancelButtonColor: '#d33'
      , confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }

</script>