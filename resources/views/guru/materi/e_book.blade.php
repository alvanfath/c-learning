@extends('_layouts.app_guru')
@section('css')

@endsection
@section('header', 'Materi E-book')
@section('content')
    <div class="row">
        @foreach ($mapel as $item)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header">
                    <div class="article-image" data-background="{{asset('upload_images/mapel/matapel.jpg')}}">
                    </div>
                    <div class="article-title">
                        <h2><a href="#">{{$item->nama}}</a></h2>
                    </div>
                </div>
                <div class="article-details">
                    @if ($item->jurusan_id == null)
                    <p>Mata Pelajaran ini bertipe {{$item->tipe}}</p>
                    @else
                    <p>Mata Pelajaran ini bertipe {{$item->tipe}}, di pelajari di jurusan {{$item->jurusan->nama}}</p>
                    @endif

                    <div class="article-cta">
                        <form action="{{route('guru.materi.ebook_loop', $item->nama)}}" method="get">
                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('guru.materi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

@endsection
