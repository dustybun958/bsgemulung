@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Users</h4>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <a class="btn btn-primary" href="{{ route('admin.users.create') }}">+ Add Data</a>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i
                                            class="bx bx-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search..."
                                        aria-label="Search..." aria-describedby="basic-addon-search31">
                                </div>
                            </div>
                        </div>
                    </div> -->
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>

                <th>Status</th>
                <th>Last Seen</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td width="250px">
                  <div class="users-list">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="text-dark">
                      <div class="avatar avatar-xs pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom"
                        data-bs-placement="top" title="{{ $user->name }}">

                        <strong class="text-sm td-name">{{ Str::limit($user->name, 12) }}</strong>
                      </div>
                    </a>
                  </div>

                </td>
                <td>{{ $user->email }}</td>

                <td>
                  @if (Cache::has('user-is-online-' . $user->id))
                  <span class="badge bg-label-success me-1">Online</span>
                  @else
                  <span class="badge bg-label-danger me-1">Offline</span>
                  @endif
                </td>
                <td>{{ \Carbon\Carbon::createFromDate($user->created_at)->diffForHumans() }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                        Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>

        <div class="ms-2 mt-2">
          {{ $users->links() }}
        </div>
      </div>

    </div>
  </div>



</div>
@endsection