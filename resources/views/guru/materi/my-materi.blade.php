@extends('_layouts.app_guru')
@section('css')

@endsection
@section('header', 'Materi Saya')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <button type="button" class="btn btn-primary">
                Total Materi <span class="badge badge-light">{{ $materi->count() }}</span>
            </button>
        </div>
        @forelse ($materi as $item)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        @if ($item->tipe == 'video')
                            <div class="article-image" data-background="{{ asset('materi/thumbnail_video/film.jpg') }}">
                            </div>
                        @else
                            <div class="article-image" data-background="{{ asset('upload_images/mapel/matapel.jpg') }}">
                            </div>
                        @endif

                        <div class="article-title">
                            <h2><a href="#">{{ $item->judul }}</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>Materi untuk kelas {{ $item->tingkat->tingkat_kelas }}</p>
                        <div class="article-cta">
                            @if ($item->tipe == 'video')
                                <a href="{{ route('guru.materi.video_details', Crypt::encryptString($item->id)) }}"
                                    class="btn btn-primary w-75 mb-1">Tonton Materi</a>
                            @else
                                <a href="{{ route('guru.materi.download.ebook', Crypt::encryptString($item->id)) }}"
                                    class="btn btn-primary mb-1 w-75">Download
                                    Materi</a>
                            @endif
                            <form action="{{route('guru.materi.destroy', Crypt::encryptString($item->id))}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger w-75">Hapus Materi</button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                <center>
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tidak ada materi</h4>
                            </div>
                            <div class="card-body">
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon bg-danger">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h2>Materi tidak tersedia</h2>
                                    <p class="lead">
                                        Kamu belum mengupload satu materi pun
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        @endforelse
    </div>

@endsection
