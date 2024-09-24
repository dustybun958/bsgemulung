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
                    text: 'Corn vs wheat estimated production for 2023'
                    , align: 'left'
                }
                , subtitle: {
                    text: 'Source: <a target="_blank" ' +
                        'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
                    , align: 'left'
                }
                , xAxis: {
                    categories: ['USA', 'China', 'Brazil', 'EU', 'Argentina', 'India']
                    , crosshair: true
                    , accessibility: {
                        description: 'Countries'
                    }
                }
                , yAxis: {
                    min: 0
                    , title: {
                        text: '1000 metric tons (MT)'
                    }
                }
                , tooltip: {
                    valueSuffix: ' (1000 MT)'
                }
                , plotOptions: {
                    column: {
                        pointPadding: 0.2
                        , borderWidth: 0
                    }
                }
                , series: [{
                        name: 'Corn'
                        , data: [387749, 280000, 129000, 64300, 54000, 34300]
                    }
                    , {
                        name: 'Wheat'
                        , data: [45321, 140000, 10000, 140500, 19500, 113500]
                    }
                ]
            });

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
<script src="https://code.highcharts.com/dashboards/modules/layout.js"></script>
@endsection
