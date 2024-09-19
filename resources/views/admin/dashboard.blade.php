@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <i class="bx bx-box text-success"></i>
            </div>
          </div>
          <span>Total Pasar</span>
          <h3 class="card-title text-nowrap mb-1">
            {{ $totalpasar }}
          </h3>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <i class="bx bx-box text-success"></i>
            </div>
          </div>
          <span>Total Lapak</span>
          <h3 class="card-title text-nowrap mb-1">
            {{ $totallapak }}
          </h3>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <i class="bx bx-box text-success"></i>
            </div>
          </div>
          <span>Total Pedagang</span>
          <h3 class="card-title text-nowrap mb-1">
            {{ $totalpedagang }}
          </h3>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
