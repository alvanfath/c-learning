@extends('_layouts.app_siswa')

@section('css')
    <style>
        .author-box .author-box-picture {
            height: 100px;
        }

        .author-box .author-box-name {
            font-size: 14px !important;
        }
    </style>
@endsection
@section('header')
    <h1>Profil Saya</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="author-box">
                                <div class="col-12">
                                    <div class="row">
                                        <img alt="image" src="{{ asset('uploads/siswa-p/') }}"
                                            onerror=this.src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                            class="rounded-circle author-box-picture" id="uploadedAvatar" alt="user-image">
                                        <div class="author-box-name pl-3 my-auto">
                                            <h5>{{ $siswa->nama_lengkap }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3 mt-3">Informasi Personal</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">NIK :</span> {{ $siswa->nik }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Name :</span> {{ $siswa->nama_lengkap }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Jenis Kelamin :</span> {{ $siswa->gender }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Tanggal Lahir :</span>
                                        {{ date('d F Y', strtotime($siswa->tanggal_lahir)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Alamat :</span> {{ $siswa->alamat }}</p>
                                </div>
                            </div>
                            <h5 class="mb-3 mt-3">Informasi Sekolah</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Nis :</span> {{ $siswa->nis }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">email :</span> {{ $siswa->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Tingkat :</span> {{ $siswa->tingkat->tingkat_kelas }}
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Jurusan :</span> {{ $siswa->jurusan->nama }}</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <p><span class="font-weight-bold">Kelas :</span> {{ $siswa->kelas->nama_kelas }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('siswa.change-password',$siswa->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Password Saat ini</label>
                            <input type="password" name="current_password" class="form-control @error('current_password')
                            is-invalid
                            @enderror" placeholder="*********">
                            @error('current_password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" class="form-control @error('new_password')
                            is-invalid
                            @enderror" placeholder="*********">
                            @error('new_password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
