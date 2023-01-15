@extends('_layouts.app_guru')
@section('css')

@endsection
@section('header', 'Dashboard')
@section('content')
<div class="row">
    @if ($guru->mapel->tipe == 'Akademis')
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa kelas {{$guru->tingkat->tingkat_kelas}}</h4>
                </div>
                <div class="card-body">
                    {{$murid_akademis}}
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa kelas {{$guru->tingkat->tingkat_kelas}} di Jurusan {{$guru->jurusan->nama}}</h4>
                </div>
                <div class="card-body">
                    {{$murid}}
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Materi {{$guru->mapel->nama}} di kelas {{$guru->tingkat->tingkat_kelas}}</h4>
                </div>
                <div class="card-body">
                    {{$materi}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        
    </div>
</div>
@endsection
