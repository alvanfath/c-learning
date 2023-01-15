@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
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
@section('header', 'Aktivitas Login')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Aktivitas Login</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#admin" role="tab"
                                aria-controls="admin" aria-selected="true">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="guru-tab" data-toggle="tab" href="#guru" role="tab"
                                aria-controls="guru" aria-selected="false">Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="siswa-tab" data-toggle="tab" href="#siswa" role="tab"
                                aria-controls="siswa" aria-selected="false">Siswa</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="admin_table">
                                        <thead>
                                            <th>Nama Admin</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="guru" role="tabpanel" aria-labelledby="guru-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="guru_table">
                                        <thead>
                                            <th>Nama Guru</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="siswa_table">
                                        <thead>
                                            <th>Nama Siswa</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                        </thead>
                                        <tbody></tbody>
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
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            initiateAdminDatatable();
            initiateGuruDatatable();
            initiateSiswaDatatable();
        })

        function initiateAdminDatatable() {
            $('#admin_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.activityadmin') }}',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                columns: [{
                        data: 'admin.nama'
                    },
                    {
                        data: 'aktivitas'
                    },
                    {
                        data: 'created_at'
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
                        previous: '<i class="bi bi-arrow-left"></i>',
                        next: '<i class="bi bi-arrow-right"></i>',
                    }
                },
            })
        }

        function initiateGuruDatatable() {
            $('#guru_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.activityguru') }}',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                columns: [{
                        data: 'guru.nama'
                    },
                    {
                        data: 'aktivitas'
                    },
                    {
                        data: 'created_at'
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
        function initiateSiswaDatatable() {
            $('#siswa_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.activitysiswa') }}',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                columns: [{
                        data: 'siswa.nama_lengkap'
                    },
                    {
                        data: 'aktivitas'
                    },
                    {
                        data: 'created_at'
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
