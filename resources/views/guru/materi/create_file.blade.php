@extends('_layouts.app_guru')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Tambah Materi E-book')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Upload Materi E-book {{ $guru->mapel->nama }} </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('guru.materi.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tipe" value="file">
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
                            <label for="file" class="col-form-label col-sm-12 col-md-12">File (pdf)</label>
                            <div class="col-sm-12 col-md-12 mb-3">
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    name="file" id="file" accept="application/pdf">
                                @error('file')
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
@endsection
