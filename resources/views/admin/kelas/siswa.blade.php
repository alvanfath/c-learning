@extends('_layouts.app')
@section('css')

@endsection
@section('header')
    Siswa {{$data->nama_kelas}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Total Siswa : {{$total_siswa}}</h4>
                    <div class="card-header-action">
                        <h4>Walikelas : {{$data->walikelas->nama}}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="siswa_table">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('admin.kelas.index')}}" class="btn btn-secondary">Kembali</a>
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
            var kelas = '{{$id}}';
            initiateDatatable(kelas);
        })
        function initiateDatatable(kelas_id) {
            $('#siswa_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax:{
                    url: '{{ route('admin.getsiswabykelas') }}',
                    data: {
                        kelas : kelas_id,
                    }
                },
                columns: [{
                        data: 'nik'
                    },
                    {
                        data: 'nis'
                    },
                    {
                        data: 'nama_lengkap',
                    },
                    {
                        data: 'gender',
                    },
                    {
                        data: 'alamat',
                    },
                    {
                        data: 'email',
                    },
                    {
                        data: 'action'
                    }
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


        function detailData(id) {
            var url = '{{route('admin.siswa.show', ':id')}}';
            window.location = url.replace(':id', id);
        }

        function deleteData(id,nama) {
            var url = '{{ route('admin.siswa.destroy', ':id') }}';
            swal({
                    title: 'Hapus siswa',
                    text: 'apakah anda yakin ingin menghapus siswa '+nama+'?',
                    icon: 'warning',
                    buttons: true,
                    warningMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'delete',
                            dataType: 'json',
                            url: url.replace(':id', id),
                            success: function(response) {
                                if (response.statusCode == 200) {
                                    iziToast.success({
                                        message: response.message,
                                        position: 'topRight'
                                    });
                                    var tingkat = $('#tingkat_id').val();
                                    var jurusan = $('#jurusan_id').val();
                                    $('#siswa_table').DataTable().destroy();
                                    initiateDatatable(jurusan,tingkat);
                                } else {
                                    iziToast.error({
                                        message: response.message,
                                        position: 'topRight'
                                    });
                                }
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        })
                    }
                });
        }
    </script>
@endsection
