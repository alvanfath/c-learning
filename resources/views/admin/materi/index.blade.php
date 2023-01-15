@extends('_layouts.app')
@section('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .gallery-fw .gallery-item {
            height: 200px;
        }
    </style>
@endsection
@section('header', 'Identitas Sekolah')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Materi</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#video" role="tab"
                                aria-controls="video" aria-selected="true">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="e-book-tab" data-toggle="tab" href="#e-book" role="tab"
                                aria-controls="e-book" aria-selected="false">E-book</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="table_video">
                                        <thead>
                                            <th>Judul</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tingkat</th>
                                            <th>Jurusan</th>
                                            <th>Diupload pada</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="e-book" role="tabpanel" aria-labelledby="e-book-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="table_e-book">
                                        <thead>
                                            <th>Judul</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tingkat</th>
                                            <th>Jurusan</th>
                                            <th>Diupload pada</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            initiateVideoDatatable();
            initiateEbookDatatable();
        })

        function initiateVideoDatatable() {
            $('#table_video').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.materi.video') }}',
                columns: [{
                        data: 'judul'
                    },
                    {
                        data: 'mapel.nama'
                    },
                    {
                        data: 'tingkat.tingkat_kelas'
                    },
                    {
                        data: 'jurusan.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'created_at',
                        defaultContent: '-'
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari Data",
                    lengthMenu: "Tampilkan _MENU_ baris",
                    zeroRecords: "Tidak ada data",
                    infoEmpty: "Menampilkan 0 - 0 (0 data)",
                    infoFiltered: "(Difilter dari _MAX_ total data)",
                    info: "Menampilkan _START_ - _END_ (_TOTAL_ data)",
                    paginate: {
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: "<i class='fa fa-angle-right'></i>",
                    }
                },
            })
        }

        function initiateEbookDatatable() {
            $('#table_e-book').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.materi.ebook') }}',
                columns: [{
                        data: 'judul'
                    },
                    {
                        data: 'mapel.nama'
                    },
                    {
                        data: 'tingkat.tingkat_kelas'
                    },
                    {
                        data: 'jurusan.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'created_at',
                        defaultContent: '-'
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari Data",
                    lengthMenu: "Tampilkan _MENU_ baris",
                    zeroRecords: "Tidak ada data",
                    infoEmpty: "Menampilkan 0 - 0 (0 data)",
                    infoFiltered: "(Difilter dari _MAX_ total data)",
                    info: "Menampilkan _START_ - _END_ (_TOTAL_ data)",
                    paginate: {
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: "<i class='fa fa-angle-right'></i>",
                    }
                },
            })
        }
    </script>
@endsection
