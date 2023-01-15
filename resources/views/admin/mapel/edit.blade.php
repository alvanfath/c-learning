@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <style>
        .current-image {
            width: 250px;
            height: 250px;
            border-radius: 3px;
            position: relative;
        }
    </style>
@endsection
@section('header', 'Edit Mapel')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mapel.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-2">
                            <label for="nama" class="col-form-label col-sm-12 col-md-12">Nama Mapel</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Biologi" value="{{ $data->nama }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 col-sm-6">
                                <label class="col-form-label">Logo Mapel</label>
                                <div>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Pilih gambar</label>
                                        <input type="file" name="logo" accept="image/png,image/jpeg,image/jpg"
                                            id="image-upload" />
                                    </div>
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if (!$errors->has('image'))
                                        <small class="text-danger">*Abaikan jika tidak ingin mengubah gambarsaat ini</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Logo Saat ini</label>
                                <div class="">
                                    <img class="current-image" src="{{asset('upload_images/mapel/'. $data->logo)}}" onerror=this.src="{{asset('upload_images/mapel/matapel.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="tipe" class="col-form-label col-sm-12 col-md-12">Tipe Mapel</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control selectric @error('tipe') is-invalid @enderror" name="tipe"
                                    id="tipe" onchange="jurusanShow(this.value)">
                                    <option value="" selected disabled>--Pilih Tipe Mapel--</option>
                                    <option value="Akademis" @if ($data->tipe == 'Akademis') selected @endif>Akademis
                                    </option>
                                    <option value="Produktif" @if ($data->tipe == 'Produktif') selected @endif>Produktif
                                    </option>
                                </select>
                                @error('tipe')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div id="jurusan-form" class="form-group row mb-2 d-none">
                            <label for="tipe" class="col-form-label col-sm-12 col-md-12">Untuk Jurusan</label>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control selectric @error('jurusan_id') is-invalid @enderror" name="jurusan_id"
                                    id="jurusan_id">
                                    <option value="">--Pilih Jurusan--</option>
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
                            <div class="col-sm-12 col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">Kembali</a>
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
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
    <script>
        $(document).ready(function () {
            var tipe = '{{$data->tipe}}';
            if (tipe == 'Produktif') {
                $("#jurusan-form").removeClass("d-none");
            }
        })

        function jurusanShow(tipe) {
            if (tipe == 'Produktif') {
                $("#jurusan-form").removeClass("d-none");
            }else{
                $("#jurusan-form").addClass("d-none");
                $('#jurusan_id').val('')
            }
        }
    </script>
@endsection
