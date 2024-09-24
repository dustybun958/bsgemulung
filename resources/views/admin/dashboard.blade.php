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

    <div id="container" style="width:50%; height:400px;"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chart = Highcharts.chart('container', {
                chart: {
                    type: 'column'
                }
                , title: {
                    text: 'Status Per Lapak'
                    , align: 'left'
                }
                // , subtitle: {
                //     text: 'Source: <a target="_blank" ' +
                //         'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
                //     , align: 'left'
                // }
                , xAxis: {
                    categories: ['Rejowinangun', 'Kebonpolo', 'Cacaban', 'Sidomukti', '	Gotong Royong']
                    , crosshair: true
                    , accessibility: {
                        description: 'Countries'
                    }
                }
                , yAxis: {
                    min: 0
                    , title: {
                        text: 'total'
                    }
                }
                , tooltip: {
                    // valueSuffix: ' (1000 MT)'
                }
                , plotOptions: {
                    column: {
                        pointPadding: 0.2
                        , borderWidth: 0
                    }
                }
                , series: [{
                        name: 'Kosong'
                        , data: [38, 28, 12, 64, 54]
                    }
                    , {
                        name: 'Isi'
                        , data: [453, 140, 100, 14, 19]
                    }
                    , {
                        name: 'Telat Bayar'
                        , data: [453, 1400, 1000, 1405, 19]
                    }
                ]
                , credits: {
                    enabled: false //mematikan watermark
                }
                , exporting: {
                    enabled: true
                }
            , });

        });

        let chart; // globally available
        document.addEventListener('DOMContentLoaded', function() {
            chart = Highcharts.stockChart('container', {
                rangeSelector: {
                    selected: 1
                }
                , series: [{
                    name: 'USD to EUR'
                    , data: usdtoeur // predefined JavaScript array
                }]
            });
        });

    </script>
</div>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
@endsection
