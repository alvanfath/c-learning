@extends('_layouts.app_guru')
@section('css')

@endsection
@section('header', 'Materi')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Materi Video</h4>
                    <div class="card-header-action">
                        <a href="{{ route('guru.materi.create_video') }}" class="btn btn-primary">Tambah Materi video</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                            <i class="fas fa-file-video"></i>
                        </div>
                        <h2>Materi Video</h2>
                        <a href="{{ route('guru.materi.video') }}" class="btn btn-primary mt-4">Jelajahi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Materi E-book</h4>
                    <div class="card-header-action">
                        <a href="{{ route('guru.materi.create_e-book') }}" class="btn btn-primary">Tambah Materi E-book</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon bg-info">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h2>Materi E-book</h2>
                        <a href="{{ route('guru.materi.ebook') }}" class="btn btn-info mt-4">Jelajahi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
