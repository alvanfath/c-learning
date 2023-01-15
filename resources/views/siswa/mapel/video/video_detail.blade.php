@extends('_layouts.app_siswa')
@section('header')
    <h1>Materi Video {{ $materi->judul }}</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $materi->mapel->nama }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <video class="w-100" height="380" controls>
                                <source src="{{ asset('materi/video/' . $materi->file) }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-12">
                            <h4><b>{{ $materi->judul }}</b></h4>
                        </div>
                        <div class="col-12">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo atque corporis beatae tempora
                                quod! Tempore ex, aliquid veniam aut ad quas quibusdam fugit sequi vitae non incidunt,
                                inventore optio esse earum. Veniam voluptate officia veritatis possimus voluptatem est
                                nobis! Quae, aliquid alias veniam sequi pariatur sit dolores omnis repudiandae officiis?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mb-5">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
