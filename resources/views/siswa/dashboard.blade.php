@extends('_layouts.app_siswa')
@section('css')

@endsection
@section('header')
<h1>Dashboard Siswa</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Halo Selamat datang {{$user->nama_lengkap}}</h4>
                </div>
                <div class="card-body">
                    <p>Didalam data yang kami kelola kamu berada di tingkat {{$user->tingkat->tingkat_kelas}} dan berada di kelas {{$user->kelas->nama_kelas}} yang di kelola oleh Bapa/ibu guru {{$user->kelas->walikelas->nama}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
