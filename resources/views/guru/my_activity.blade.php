@extends('_layouts.app_guru')
@section('css')
@endsection
@section('header', 'Aktivitas saya')
@section('content')
    <div class="row">
        @foreach ($guru as $item)
        <div class="col-6">
            <div class="activities">
                <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="activity-detail">
                        <div class="mb-2">
                            <span class="text-job text-primary">{{$item->created_at->diffForHumans()}}</span>
                            <span class="bullet"></span>
                        </div>
                        <p>{{$item->aktivitas}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
