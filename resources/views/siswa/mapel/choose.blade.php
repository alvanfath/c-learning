@extends('_layouts.app_siswa')
@section('header')
    <h1>Pilih Tipe Materi {{$mapel->nama}}</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Materi Video</h4>
                </div>
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                            <i class="fas fa-file-video"></i>
                        </div>
                        <h2>Materi Video</h2>
                        <a href="{{route('siswa.materi.video', $mapel->nama)}}" class="btn btn-primary mt-4">Jelajahi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Materi E-book</h4>
                </div>
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon bg-info">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h2>Materi E-book</h2>
                        <a href="{{route('siswa.materi.e-book', $mapel->nama)}}" class="btn btn-info mt-4">Jelajahi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mb-5">
            <a href="{{ route('siswa.mapel') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
