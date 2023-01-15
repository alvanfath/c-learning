@extends('_layouts.app_siswa')
@section('header')
    <h1>Materi E-book {{ $nama }}</h1>
@endsection
@section('content')
    <div class="row">
        @forelse ($materi as $item)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('materi/file/ebook.jpeg') }}">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><a href="#">Diupload Pada</a>
                            <div class="bullet"></div> <a href="#">{{ $item->created_at->diffForHumans() }}</a>
                        </div>
                        <div class="article-title">
                            <h2><a href="{{route('siswa.download.ebook', Crypt::encryptString($item->id))}}">{{ $item->judul }}</a></h2>
                        </div>
                        <p>Materi untuk kelas {{ $item->tingkat->tingkat_kelas }}</p>
                        <div class="article-user">
                            <img alt="image" style="width: 40px; height:40px;" src="{{ asset('upload_images/guru/' . $item->guru->gambar) }}"
                                onerror=this.src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <b>{{ $item->uploaded_by }}</b>
                                </div>
                                <div class="text-job">Guru {{ $item->guru->mapel->nama }} Kelas
                                    {{ $item->guru->tingkat->tingkat_kelas }}</div>
                            </div>
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
                                  Maaf materi  e-book untuk {{$nama}} masih belum tersedia untuk saat ini
                                </p>
                              </div>
                            </div>
                          </div>
                    </div>
                </center>

            </div>
        @endforelse
        <div class="col-sm-12 mb-5">
            <a class="btn btn-secondary" href="{{route('siswa.mapel.choose', $nama)}}">Kembali</a>
        </div>
    </div>
@endsection
