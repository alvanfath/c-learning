@extends('_layouts.app_siswa')
@section('css')
    <style>
        .card-body {
            max-height: 70vh;
            overflow: auto;
        }
    </style>
@endsection
@section('header')
    <h1>Kelas {{ $user->kelas->nama_kelas }}</h1>
    <h1>Walikelas : {{$user->kelas->walikelas->nama}}</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Lihat Teman Sekelasmu</h4>
                    <h4>Total Siswa : {{$classmate->count()}}</h4>
                </div>
                <div class="card-body mb-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classmate as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->gender }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Yahaha gapunya temen kasian banget cuk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
