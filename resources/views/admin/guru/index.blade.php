@extends('_layouts.app')
@section('css')

@endsection
@section('header', 'Guru')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Guru</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">Tambah Guru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Jurusan</label>
                                        <select class="form-control" onchange="reqJurusan(this.value)" id="jurusan_id">
                                            <option value="" selected>--Semua Jurusan--</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tingkat</label>
                                        <select class="form-control" onchange="reqTingkat(this.value)" id="tingkat_id">
                                            <option value="" selected>--Semua Tingkat--</option>
                                            @foreach ($tingkat as $item)
                                                <option value="{{ $item->id }}">{{ $item->tingkat_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Mapel</label>
                                        <select class="form-control" onchange="reqMapel(this.value)" id="mapel_id">
                                            <option value="" selected>--Semua Mapel--</option>
                                            @foreach ($mapel as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table" id="guru_table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jurusan</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Mengajar di kelas</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
            initiateDatatable();
        })

        function reqJurusan(jurusan) {
            var tingkat = $('#tingkat_id').val();
            var mapel = $('#mapel_id').val();
            $('#guru_table').DataTable().destroy();
            initiateDatatable(jurusan, tingkat, mapel);
        }

        function reqTingkat(tingkat) {
            var jurusan = $('#jurusan_id').val();
            var mapel = $('#mapel_id').val();
            $('#guru_table').DataTable().destroy();
            initiateDatatable(jurusan, tingkat, mapel);
        }

        function reqMapel(mapel) {
            var tingkat = $('#tingkat_id').val();
            var jurusan = $('#jurusan_id').val();
            $('#guru_table').DataTable().destroy();
            initiateDatatable(jurusan, tingkat, mapel);
        }

        function initiateDatatable(jurusan = '', tingkat = '', mapel = '') {
            $('#guru_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: {
                    url: '{{ route('admin.getguru') }}',
                    data: {
                        jurusan: jurusan,
                        tingkat: tingkat,
                        mapel: mapel
                    }
                },
                columns: [{
                        data: 'nama'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'jurusan.nama'
                    },
                    {
                        data: 'mapel.nama'
                    },
                    {
                        data: 'tingkat.tingkat_kelas'
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

        function editData(id) {
            var url = "{{ route('admin.guru.edit', ':id') }}";
            window.location = url.replace(':id', id);
        }

        function deleteData(id, nama) {
            var url = '{{ route('admin.guru.destroy', ':id') }}';
            swal({
                    title: 'Hapus guru',
                    text: 'apakah anda yakin ingin menghapus guru ' + nama + '? \n jika guru ini merupakan walikelas maka wewenang walikelas akan di pindahkan ke guru lain dengan tingkat yang sama.',
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
                                    var jurusan = $('#jurusan_id').val();
                                    var mapel = $('#mapel_id').val();
                                    var tingkat = $('#tingkat_id').val();
                                    $('#guru_table').DataTable().destroy();
                                    initiateDatatable(jurusan, tingkat, mapel);
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
