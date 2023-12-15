@extends('layout.main')
@section('title', 'Dashboard')
@section('content')
    {{-- Dashboard --}}

    {{-- Jumlah Fakultas => Model Fakultas
    {{ count($fakultas) }}

    Jumlah Program Studi => Model Prodi
    {{ count($prodi) }}

    Jumlah Mahasiswa => Model Mahasiswa
    {{ count($mahasiswa) }} --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Dashboard</p>
                <p class="text-muted"></p>
                <div class="row mb-3">
                  <div class="col-md-7">
                    <div class="d-flex justify-content-between traffic-status">
                      <div class="item">
                        <p class="mb-">Fakultas</p>
                        <h5 class="font-weight-bold mb-0">{{ count($fakultas) }}</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Program Studi</p>
                        <h5 class="font-weight-bold mb-0">{{ count($prodi) }}</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-">Mahasiswa</p>
                        <h5 class="font-weight-bold mb-0">{{ count($mahasiswa) }}</h5>
                        <div class="color-border"></div>
                      </div>
                    </div>
                  </div>
                </div>
                Grafik mahasiswa berdasarkan program studi
                {{--HTML--}}
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                {{-- Grafik mahasiswa berdasarka program studi --}}
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
                {{-- Grafik mahassiswa berdasarkan jenis kelamin --}}
                <figure class="highcharts-figure">
                    <div id="container-jk"></div>
                </figure>

                {{--CSS--}}
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                        min-width: 310px;
                        max-width: 800px;
                        margin: 1em auto;
                    }

                    #container {
                        height: 400px;
                    }

                    .highcharts-data-table table {
                        font-family: Verdana, sans-serif;
                        border-collapse: collapse;
                        border: 1px solid #ebebeb;
                        margin: 10px auto;
                        text-align: center;
                        width: 100%;
                        max-width: 500px;
                    }

                    .highcharts-data-table caption {
                        padding: 1em 0;
                        font-size: 1.2em;
                        color: #555;
                    }

                    .highcharts-data-table th {
                        font-weight: 600;
                        padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                        padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                        background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                        background: #f1f7ff;
                    }
                </style>

                {{--JS Grafik mahasiswa program studi--}}
                <script>
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Grafik Mahasiswa Berdasarkan Program Studi',
                            align: 'left'
                        },
                        subtitle: {
                            text:
                                'Source: <a target="_blank" ' +
                                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
                            align: 'left'
                        },
                        xAxis: {
                            categories: [
                                @foreach ($grafik_mhs as $item)
                                    '{{ $item->nama }}',
                                @endforeach
                            ],
                            crosshair: true,
                            accessibility: {
                                description: 'Program Studi'
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '1000 metric tons (MT)'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' (1000 MT)'
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [
                            {
                                name: 'Mahasiswa',
                                data: [
                                    @foreach ($grafik_mhs as $item)
                                        {{ $item->jumlah }},
                                    @endforeach
                                ]
                            }
                        ]
                    });
                </script>
                {{-- JS Grafik Pie mahasiswa jenis kelamin --}}
                <script>
                    Highcharts.chart('container-jk', {
                        chart: {
                            type: 'pie'
                        },
                        title: {
                            text: 'Jumlah Mahasiswa per Jenis Kelamin'
                        },
                        tooltip: {
                            valueSuffix: '%'
                        },
                        subtitle: {
                            text:
                            ''
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: [{
                                    enabled: true,
                                    distance: 20
                                }, {
                                    enabled: true,
                                    distance: -40,
                                    format: '{point.percentage:.1f}%',
                                    style: {
                                        fontSize: '1.2em',
                                        textOutline: 'none',
                                        opacity: 0.7
                                    },
                                    filter: {
                                        operator: '>',
                                        property: 'percentage',
                                        value: 10
                                    }
                                }]
                            }
                        },
                        series: [
                            {
                                name: 'Persentase',
                                colorByPoint: true,
                                data: [
                                    @foreach ($grafik_jk as $item)
                                        {
                                            name: '{{ $item->jk }}',
                                            y: {{ $item->jumlah }}
                                        },
                                    @endforeach
                                ]
                            }
                        ]
                    });
                </script>
              </div>
            </div>
          </div>
    </div>
@endsection
