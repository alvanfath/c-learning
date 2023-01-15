@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Tambah Kelas')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kelas.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-sm-12">
                                <b><small class="text-danger">*</small> Wajib diisi</b>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="jurusan" class="col-form-label col-sm-12 col-md-12"><small
                                    class="text-danger">*</small> Jurusan</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="jurusan_id" class="form-control select2" id="jurusan"
                                    onchange="getSingkatanJurusan(this.value)">
                                    <option value="" selected disabled>--Pilih Jurusan--</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($data->jurusan_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="tingkat" class="col-form-label col-sm-12 col-md-12"><small
                                    class="text-danger">*</small>Tingkat</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="tingkat_id" class="form-control select2" id="tingkat"
                                    onchange="getGuruTingkat(this.value)">
                                    <option value="" selected disabled>--Pilih Tingkat Kelas--</option>
                                    @foreach ($tingkat as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($data->tingkat_id == $item->id) selected @endif>{{ $item->tingkat_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tingkat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="walikelas" class="col-form-label col-sm-12 col-md-12"><small
                                    class="text-danger">*</small>walikelas</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="walikelas_id" class="form-control select2" id="walikelas">
                                    <option value="" selected disabled>--Pilih Wali Kelas--</option>
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($data->walikelas_id == $item->id) selected @endif>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('walikelas_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="nama_kelas" class="col-form-label col-sm-12 col-md-12"><small
                                    class="text-danger">*</small> Nama Kelas</label>
                            <div class="col-sm-12 col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend w-25">
                                        <input id="singkatan_kelas" name="singkatan_kelas" class="input-group-text w-50"
                                            readonly value="{{ $singkatan_jurusan }}">
                                        <input id="tingkat_kelas" name="tingkat_kelas" class="input-group-text w-50"
                                            readonly value="{{ $tingkat_kelas }}">
                                    </div>
                                    <input type="text" name="urutan" value="{{ $urutan_kelas }}"
                                        class="form-control w-75">
                                </div>
                                @error('nama_kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror

                                @error('singkatan_kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror

                                @error('tingkat_kelas')
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                                @error('urutan')
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
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
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script>
        function getGuruTingkat(tingkat) {
            $.ajax({
                type: 'post',
                url: '{{ route('admin.getgurubytingkat') }}',
                data: {
                    tingkat: tingkat
                },
                cache: false,
                success: function(response) {
                    $("#walikelas").html(response.option)
                    $("#tingkat_kelas").val(response.tingkat)
                }
            })
        }

        function getSingkatanJurusan(jurusan) {
            $.ajax({
                type: 'post',
                url: '{{ route('admin.getsingkatanjurusan') }}',
                data: {
                    jurusan: jurusan
                },
                cache: false,
                success: function(response) {
                    $("#singkatan_kelas").val(response)
                }
            })
        }
    </script>
@endsection
