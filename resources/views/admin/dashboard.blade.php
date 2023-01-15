@extends('_layouts.app')
@section('css')
@endsection
@section('header', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{ $siswa }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Jurusan</h4>
                    </div>
                    <div class="card-body">
                        {{ $jurusan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{ $kelas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Mapel</h4>
                    </div>
                    <div class="card-body">
                        {{ $mapel }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Guru</h4>
                    </div>
                    <div class="card-body">
                        {{ $guru }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Materi</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_materi }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-video"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Materi Video</h4>
                    </div>
                    <div class="card-body">
                        {{ $video }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Materi E-book</h4>
                    </div>
                    <div class="card-body">
                        {{ $e_book }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Materi Video terpopuler</h4>
                </div>
                <div class="card-body">
                    <canvas id="statistik_tonton"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Materi E-book terpopuler </h4>
                </div>
                <div class="card-body">
                    <canvas id="statistik_download"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    {{-- statistik materi tonton --}}
    @if ($tonton->count() > 0)
        @foreach ($tonton as $item)
            @php
                $label_tonton[] = $item->materi->judul;
                $value_tonton[] = $item->total;
            @endphp
        @endforeach
        <script>
            var label = {{ Js::from($label_tonton) }};
            var value = {{ Js::from($value_tonton) }};

            const data = {
                labels: label,
                datasets: [{
                    label: 'Total Ditonton',
                    data: value,
                    borderWidth: 2,
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: true
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            };
            var ctx = document.getElementById("statistik_tonton").getContext('2d');
            const myChart = new Chart(
                ctx,
                config
            );
        </script>
    @endif
    {{-- end statsitik materi tonton --}}

    {{-- statistik materi download --}}
    @if ($download->count() > 0)
        @foreach ($download as $item)
            @php
                $label_download[] = $item->materi->judul;
                $value_download[] = $item->total;
            @endphp
        @endforeach
        <script>
            //chart statistik tonton
            var labelDownload = {{ Js::from($label_download) }};
            var valueDownload = {{ Js::from($value_download) }};

            const dataDownload = {
                labels: labelDownload,
                datasets: [{
                    label: 'Total Didownload',
                    data: valueDownload,
                    borderWidth: 2,
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 1
                }]
            };

            const configDownload = {
                type: 'bar',
                data: dataDownload,
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: true
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            };
            var ctxDownload = document.getElementById("statistik_download").getContext('2d');
            const chartDownload = new Chart(
                ctxDownload,
                configDownload
            );
        </script>
    @endif
    {{-- end statistik materi download --}}

@endsection
