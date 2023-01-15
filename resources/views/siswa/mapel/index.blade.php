@extends('_layouts.app_siswa')
@section('css')

@endsection
@section('header')
<h1>Mata Pelajaran di jurusan {{$user->jurusan->nama}}</h1>
@endsection
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
                    <p>Ayo pelajari {{$item->nama}}</p>
                    <div class="article-cta">
                        <form action="{{route('siswa.mapel.choose', $item->nama)}}" method="get">
                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>

@endsection
