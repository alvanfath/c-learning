@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Tambah Guru')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Guru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.guru.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-sm-12">
                                <b ><small class="text-danger">*</small> Wajib diisi</b>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="nama" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Nama</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Jhon S.Pd."
                                    value="{{ $data->nama }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Email</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Jhon@gmail.com"
                                    value="{{ $data->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="tingkat" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small>Mengajar di Tingkat</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="tingkat_id" class="form-control select2" id="tingkat">
                                    <option value="" selected disabled>--Pilih Tingkat Kelas--</option>
                                    @foreach ($tingkat as $item)
                                        <option value="{{ $item->id }}" @if($data->tingkat_id == $item->id) selected @endif>{{ $item->tingkat_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('tingkat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="jurusan" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Jurusan</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="jurusan_id" class="form-control select2" id="jurusan" onchange="getMapel(this.value)">
                                    <option value="" selected disabled>--Pilih Jurusan Mengajar--</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}" @if($data->jurusan_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="mapel" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Mata Pelajaran</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="mapel_id" class="form-control select2" id="mapel_form">
                                    <option value="" selected disabled>--Pilih Mata Pelajaran--</option>
                                    @foreach ($mapel as $item)
                                        <option value="{{ $item->id }}" @if($data->mapel_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('mapel_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script>
        function getMapel(jurusan){
            $.ajax({
                type: 'post',
                cache: false,
                data: {
                    jurusan_id : jurusan
                },
                url: '{{route('admin.getmapeljurusan')}}',
                success: function (response) {
                    $('#mapel_form').html(response)
                },error : function (error) {
                    console.log(error)
                }
            })
        }
    </script>
@endsection
