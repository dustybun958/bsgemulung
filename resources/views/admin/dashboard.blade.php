@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <!-- Bungkus ikon dengan elemen <a> agar dapat diklik -->
                            <a href="/admin/pasar">
                                <i class="bx bx-buildings" style="color: #2A6DA5; cursor: pointer;"></i>
                            </a>
                        </div>
                    </div>
                    <span>Total Pasar</span>
                    <h3 class="card-title text-nowrap mb-1">
                        {{ $totalpasar }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <!-- Bungkus ikon dengan elemen <a> agar dapat diklik -->
                            <a href="/admin/lapak">
                                <i class="bx bx-store" style="color: #2A6DA5; cursor: pointer;"></i>
                            </a>
                        </div>
                    </div>
                    <span>Total Lapak</span>
                    <h3 class="card-title text-nowrap mb-1">
                        {{ $totallapak }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <!-- Bungkus ikon dengan elemen <a> agar dapat diklik -->
                            <a href="/admin/pedagang">
                                <i class="bx bx-group" style="color: #2A6DA5; cursor: pointer;"></i>
                            </a>
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


    <div class="row">
        <div class="col-lg-6 mb-3">
            {{-- start container status per lapak --}}
            <div id="container" style="width:100%; height:400px;">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Data yang dikirim dari Laravel
                        var categories = @json($categories);
                        var dataKosong = @json($dataKosong);
                        var dataIsi = @json($dataIsi);
                        var dataTelatBayar = @json($dataTelatBayar);

                        console.log(categories); // Cek data di konsol
                        console.log(dataKosong); // Cek data di konsol
                        console.log(dataIsi); // Cek data di konsol
                        console.log(dataTelatBayar); // Cek data di konsol

                        const chart = Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            }
                            , title: {
                                text: 'Status Per Lapak'
                            }
                            , xAxis: {
                                categories: categories
                            }
                            , yAxis: {
                                min: 0
                                , title: {
                                    text: 'Jumlah Lapak'
                                }
                            }
                            , series: [{
                                name: 'Kosong'
                                , data: dataKosong,
                                // color: '#FF645B'
                            }, {
                                name: 'Isi'
                                , data: dataIsi,
                                // color: '#19FB8B'
                            }, {
                                name: 'Telat Bayar'
                                , data: dataTelatBayar,
                                // color: '#FAD500'
                            }]
                            , credits: {
                                enabled: false
                            }
                            , exporting: {
                                enabled: true
                            }
                        });
                    });

                </script>

            </div>
            {{-- stop container status per lapak --}}
        </div>

        <div class="col-lg-6">
            {{-- start container status pedagang --}}
            <div id="container2" style="width:100%; height:400px;">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Data yang dikirim dari Laravel
                        var categories2 = @json($categories2);
                        var statusAktif = @json($statusAktif);
                        var statusTidakAktif = @json($statusTidakAktif);

                        console.log(categories2); // Debugging
                        console.log(statusAktif); // Debugging
                        console.log(statusTidakAktif); // Debugging


                        const chart = Highcharts.chart('container2', {
                            chart: {
                                type: 'column'
                            }
                            , title: {
                                text: 'Status Pedagang'
                            }
                            , xAxis: {
                                categories: categories2
                            }
                            , yAxis: {
                                min: 0
                                , title: {
                                    text: 'Jumlah Status'
                                }
                            }
                            , series: [{
                                name: 'Aktif'
                                , data: statusAktif
                                // , color: '#19FB8B'
                            }, {
                                name: 'Tidak Aktif'
                                , data: statusTidakAktif
                                // , color: '#FF645B'
                            }]
                            , credits: {
                                enabled: false
                            }
                            , exporting: {
                                enabled: true
                            }
                        });
                    });

                </script>

            </div>
            {{-- stop container status pedagang --}}
        </div>

    </div>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    @endsection
