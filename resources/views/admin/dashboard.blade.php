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

    <div id="container" style="width:100%; height:400px; margin-bottom: 20px;">
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
                        , data: dataKosong
                    }, {
                        name: 'Isi'
                        , data: dataIsi
                    }, {
                        name: 'Telat Bayar'
                        , data: dataTelatBayar
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

    <div class="row">
        <div class="col-lg-6">
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
                            }, {
                                name: 'Tidak Aktif'
                                , data: statusTidakAktif
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
        </div>
        <div class="col-lg-6">
            <div id="container3" style="width:100%; height:400px;">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Data yang dikirim dari Laravel
                        var categories = @json($categories);
                        var dataKosong = @json($dataKosong);
                        var dataIsi = @json($dataIsi);
                        var dataTelatBayar = @json($dataTelatBayar);

                        // Gabungkan data untuk pie chart
                        var totalKosong = dataKosong.reduce((a, b) => a + b, 0);
                        var totalIsi = dataIsi.reduce((a, b) => a + b, 0);
                        var totalTelatBayar = dataTelatBayar.reduce((a, b) => a + b, 0);

                        const chart = Highcharts.chart('container3', {
                            chart: {
                                type: 'pie'
                                , custom: {}
                                , events: {
                                    render() {
                                        const chart = this
                                            , series = chart.series[0];
                                        let customLabel = chart.options.chart.custom.label;

                                        if (!customLabel) {
                                            customLabel = chart.options.chart.custom.label =
                                                chart.renderer.label(
                                                    'Total<br/>' +
                                                    '<strong>' + (totalKosong + totalIsi + totalTelatBayar) + '</strong>'
                                                )
                                                .css({
                                                    color: '#000'
                                                    , textAnchor: 'middle'
                                                })
                                                .add();
                                        }

                                        const x = series.center[0] + chart.plotLeft
                                            , y = series.center[1] + chart.plotTop -
                                            (customLabel.attr('height') / 2);

                                        customLabel.attr({
                                            x
                                            , y
                                        });
                                        // Set font size based on chart diameter
                                        customLabel.css({
                                            fontSize: `${series.center[2] / 12}px`
                                        });
                                    }
                                }
                            }
                            , accessibility: {
                                point: {
                                    valueSuffix: '%'
                                }
                            }
                            , title: {
                                text: 'Status Pasar per Zonasi'
                            }
                            , tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
                            }
                            , legend: {
                                enabled: false
                            }
                            , plotOptions: {
                                series: {
                                    allowPointSelect: true
                                    , cursor: 'pointer'
                                    , borderRadius: 8
                                    , dataLabels: [{
                                        enabled: true
                                        , distance: 20
                                        , format: '{point.name}'
                                    }, {
                                        enabled: true
                                        , distance: -15
                                        , format: '{point.percentage:.0f}%'
                                        , style: {
                                            fontSize: '0.9em'
                                        }
                                    }]
                                    , showInLegend: true
                                }
                            }
                            , series: [{
                                name: 'Status'
                                , colorByPoint: true
                                , innerSize: '75%'
                                , data: [{
                                    name: 'Sayur'
                                    , y: totalKosong
                                }, {
                                    name: 'Daging'
                                    , y: totalIsi
                                }, {
                                    name: 'Pakaian'
                                    , y: totalTelatBayar
                                }, {
                                    name: 'Sepatu'
                                    , y: totalKosong
                                }, {
                                    name: 'Kuliner'
                                    , y: totalKosong
                                }, {
                                    name: 'Bumbu Dapur'
                                    , y: totalKosong
                                }, {
                                    name: 'Sembako'
                                    , y: totalKosong
                                }, {
                                    name: 'Elektronik'
                                    , y: totalKosong
                                }, ]
                            }]
                            , credits: {
                                enabled: false
                            }
                        });
                    });

                </script>
            </div>
        </div>

    </div>

</div>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
@endsection
