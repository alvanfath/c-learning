@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('header', 'Edit Jursan')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Jurusan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.jurusan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-sm-12">
                                <b ><small class="text-danger">*</small> Wajib diisi</b>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="nama" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Nama Jurusan</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Rekayasa Perangkat Lunak"
                                    value="{{ $data->nama }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="singkatan" class="col-form-label col-sm-12 col-md-12"><small class="text-danger">*</small> Singkatan Jurusan</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control @error('singkatan') is-invalid @enderror"
                                    name="singkatan" id="singkatan" placeholder="RPL" value="{{ $data->singkatan }}">
                                @error('singkatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="pembimbing" class="col-form-label col-sm-12 col-md-12">Guru Pembimbing</label>
                            <div class="col-sm-12 col-md-12">
                                <select name="pembimbing_id" class="form-control select2" id="pembimbing">
                                    <option value="" selected disabled></option>
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}" @if($data->pembimbing_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('singkatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
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
