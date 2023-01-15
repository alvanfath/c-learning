@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
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
    </style>
@endsection
@section('header', 'Tambah Siswa')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.siswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <div class="col-md-12 col-sm-12">
                                        <b><small class="text-danger">*</small> Wajib diisi</b>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group  mb-2">
                                    <label for="nik" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Nik Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                            name="nik" id="nik"
                                            value="{{ old('nik') }}">
                                        @error('nik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="nama_lengkap" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Nama Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text"
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            name="nama_lengkap" id="nama_lengkap"
                                            value="{{ old('nama_lengkap') }}">
                                        @error('nama_lengkap')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="gender" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-12">
                                        <select name="gender" class="form-control select2" id="gender">
                                            <option value="" selected disabled></option>
                                            <option value="Laki-laki" @if (old('gender') == 'Laki-laki') selected @endif>
                                                Laki-laki
                                            </option>
                                            <option value="perempuan" @if (old('gender') == 'Perempuan') selected @endif>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group  mb-2">
                                    <label for="tanggal_lahir" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Tanggal Lahir Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text"
                                            class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                        @error('tanggal_lahir')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  mb-2">
                                    <label for="alamat" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Alamat Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <textarea name="alamat" id="alamat"
                                            class="form-control @error('alamat')
                                        is-invalid
                                        @enderror"
                                            cols="30" rows="10">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="email" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Email Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Password Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="id_tingkat" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Tingkat Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <select name="id_tingkat" class="form-control select2" id="id_tingkat" onchange="reqTingkat(this.value)">
                                            <option value="" selected disabled>
                                            <option selected disabled value="">--Pilih Tingkat Siswa--</option>
                                            @foreach ($tingkat as $item)
                                                <option value="{{ $item->id }}" @if(old('id_tingkat') == $item->id) selected @endif>{{ $item->tingkat_kelas }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_tingkat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="id_jurusan" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Jurusan Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <select name="id_jurusan" class="form-control select2"
                                            onchange="reqJurusan(this.value)" id="id_jurusan">
                                            <option value="" selected disabled>--Pilih jurusan Siswa--</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id }}" @if(old('id_jurusan') == $item->id) selected @endif>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_jurusan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="id_kelas" class="col-form-label col-sm-12 col-md-12"><small
                                            class="text-danger">*</small> Kelas Siswa</label>
                                    <div class="col-sm-12 col-md-12">
                                        <select name="id_kelas" class="form-control select2" id="id_kelas">
                                            @if (Session::has('kelas'))
                                            @php
                                                $kelas = Session::get('kelas');
                                            @endphp
                                            <option value="" selected disabled>--Pilih Kelas--</option>
                                            @foreach ($kelas as $item)
                                            <option value="{{$item->id}}" @if(old('id_kelas') == $item->id) selected @endif>{{$item->nama_kelas}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('id_kelas')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  mb-2">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="float-right">
                                            <a href="{{ route('admin.siswa.index') }}"
                                                class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
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
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
    <script>
        function reqJurusan(jurusan) {
            var tingkat = $('#id_tingkat').val();
            getKelas(jurusan, tingkat);
        }

        function reqTingkat(tingkat) {
            var jurusan = $('#id_jurusan').val();
            getKelas(jurusan, tingkat)
        }

        function getKelas(jurusan, tingkat) {
            var url = '{{ route('admin.getkelasbyjurusanandtingkat') }}';
            if (jurusan != '' && tingkat != '') {
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        jurusan: jurusan,
                        tingkat: tingkat
                    },
                    success: function success(response) {
                        $('#id_kelas').html(response)
                    }
                })
            }
        }
    </script>
@endsection
