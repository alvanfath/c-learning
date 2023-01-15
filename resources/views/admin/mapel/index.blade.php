@extends('_layouts.app')
@section('css')

@endsection
@section('header', 'Mata Pelajaran')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Mata Pelajaran</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary">Tambah Mapel</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="mapel_table">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Jenis Mapel</th>
                                <th>Jurusan</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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

        function initiateDatatable() {
            $('#mapel_table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.getmapel') }}',
                columns: [{
                        data: 'nama'
                    },
                    {
                        data: 'tipe'
                    },
                    {
                        data: 'jurusan.nama',
                        defaultContent : '-'
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
            var url = '{{ route('admin.mapel.edit', ':id') }}';
            window.location = url.replace(':id', id)
        }

        function deleteData(id,nama) {
            var url = '{{ route('admin.mapel.destroy', ':id') }}';
            swal({
                    title: 'Hapus Mata Pelajaran',
                    text: 'apakah anda yakin ingin menghapus mata pelajaran '+nama+'?',
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
                                    $('#mapel_table').DataTable().ajax.reload()
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
