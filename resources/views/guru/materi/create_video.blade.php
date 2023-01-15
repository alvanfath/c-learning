@extends('_layouts.app_guru')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Tambah Materi Video')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Upload Materi Video {{ $guru->mapel->nama }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.materi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tipe" value="video">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-sm-12">
                                <b><small class="text-danger">*</small> Materi akan diurutkan berdasarkan mata pelajaran
                                    yang dipegang oleh guru masing masing</b>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="judul" class="col-form-label col-sm-12 col-md-12">Judul Materi</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" id="judul" placeholder="Ekosistem Stabil"
                                    value="{{ old('judul') }}">
                                @error('judul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="file" class="col-form-label col-sm-12 col-md-12">Video</label>
                            <div class="col-sm-4 col-md-4 mb-3">
                                <label class="btn btn-primary w-100"><input type="file"
                                        class="form-control @error('file') is-invalid @enderror" name="file"
                                        id="file" onchange="previewVideo(event)" accept="video/mp4"
                                        hidden>Upload</label>
                                @error('file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-7 col-md-7">
                                <video width="300" height="200" class="d-none" controls>
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="deskripsi" class="col-form-label col-sm-12 col-md-12">Deskripsi</label>
                            <div class="col-sm-12 col-md-12">
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('guru.materi.index') }}" class="btn btn-secondary">Kembali</a>
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
        function previewVideo(event) {
            var file = event.target.files[0];
            var blobURL = URL.createObjectURL(file);
            var video = document.querySelector("video")
            video.classList.remove("d-none")
            video.src = blobURL;
        }
    </script>
@endsection
