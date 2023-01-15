@extends('_layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
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

        .gallery-fw .gallery-item{
            height: 200px;
        }
    </style>
@endsection
@section('header', 'Identitas Sekolah')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Indentitas {{ strtoupper($data->nama_sekolah) }}</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->isEmpty() ? 'active' : '' }}" id="home-tab" data-toggle="tab"
                                href="#identity" role="tab" aria-controls="identity" aria-selected="true">Identitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->isEmpty() ? '' : 'active' }}" id="profile-tab" data-toggle="tab"
                                href="#change" role="tab" aria-controls="change" aria-selected="false">Ubah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="galery-tab" data-toggle="tab" href="#galery" role="tab"
                                aria-controls="galery" aria-selected="false">Galeri</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ $errors->isEmpty() ? 'show active' : '' }}" id="identity"
                            role="tabpanel" aria-labelledby="identity-tab">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span>Nama Sekolah:</span>
                                        <span><b>{{ strtoupper($data->nama_sekolah) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Negara:</span>
                                        <span><b>{{ strtoupper($data->negara) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Provinsi:</span>
                                        <span><b>{{ strtoupper($data->provinsi) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Kota:</span>
                                        <span><b>{{ strtoupper($data->kota) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Email:</span>
                                        <span><b>{{ $data->email }}</b></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span>Kode postal:</span>
                                        <span><b>{{ strtoupper($data->kode_postal) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Alamat:</span>
                                        <span><b>{{ $data->alamat }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Kepala Sekolah:</span>
                                        <span><b>{{ strtoupper($data->kepala_sekolah) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Pemilik Yayasan:</span>
                                        <span><b>{{ strtoupper($data->pemilik_yayasan) }}</b></span>
                                    </div>
                                    <div class="form-group">
                                        <span vlass>Akreditasi: </span>
                                        <h6><b>{{ strtoupper($data->akreditasi) }}</b></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $errors->isEmpty() ? '' : 'show active' }}" id="change"
                            role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('admin.our-scholl.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Sekolah:</label>
                                            <input type="text" name="nama_sekolah"
                                                class="form-control @error('nama_sekolah')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->nama_sekolah }}">
                                            @error('nama_sekolah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Negara:</label>
                                            <input type="text" name="negara"
                                                class="form-control @error('negara')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->negara }}">
                                            @error('negara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Provinsi:</label>
                                            <input type="text" name="provinsi"
                                                class="form-control @error('provinsi')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->provinsi }}">
                                            @error('provinsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Kota:</label>
                                            <input type="text" name="kota"
                                                class="form-control @error('kota')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->kota }}">
                                            @error('kota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Seluler:</label>
                                            <input type="text" name="no_telp"
                                                class="form-control phone-number @error('no_telp')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->no_telp }}">
                                            @error('no_telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode postal:</label>
                                            <input type="text" name="kode_postal" class="form-control"
                                                value="{{ $data->kode_postal }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat:</label>
                                            <textarea name="alamat"
                                                class="form-control @error('alamat')
                                            is-invalid
                                            @enderror">{{ $data->alamat }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Kepala Sekolah:</label>
                                            <input type="text" name="kepala_sekolah"
                                                class="form-control @error('kepala_sekolah')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->kepala_sekolah }}">
                                            @error('kepala_sekolah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="email"
                                                class="form-control @error('email')
                                            is-invalid
                                            @enderror"
                                                value="{{ $data->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="galery" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="gallery gallery-fw" data-item-height="300">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img01.jpg')}}"
                                            data-title="Image 1"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img02.jpg')}}"
                                            data-title="Image 2"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img03.jpg')}}"
                                            data-title="Image 3"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img04.jpg')}}"
                                            data-title="Image 4"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img05.jpg')}}"
                                            data-title="Image 5"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img06.jpg')}}"
                                            data-title="Image 6"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img06.jpg')}}"
                                            data-title="Image 6"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img07.jpg')}}"
                                            data-title="Image 7"></div>
                                        <div class="gallery-item" data-image="{{asset('assets/img/news/img08.jpg')}}"
                                            data-title="Image 8"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

@endsection
