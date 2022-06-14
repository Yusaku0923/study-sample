@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <div>

    </div> --}}
    <h1>Home</h1>
    <div class="col-12 text-center mt-3">
        <button class="col-lg-3 col-md-5 col-8 py-1 btn btn-primary" style="font-size: 22px;font-weight: bold;">新規作成</button>
    </div>
@stop

@section('content')
    <div class="col-12 mt-3">
        @if (!empty($on_schedule) || !empty($over_deadline))
            @if (!empty($over_deadline))
            <div class="card col-lg-6 col-md-8 col-12 bg-danger mx-auto">
                <div class="card-header fs-1">⚠期限が過ぎている項目があります！⚠</div>
                <div class="card-body">
                    @foreach($over_deadline as $schedule)
                    <a href="#">
                        <div class="card bg-white">
                            <div class="card-body position-relative pt-2 pl-0">
                                <div class="col-12 d-flex flex-row">
                                    <div class="subject-icon icon-{{$schedule['record']['subject']}}">
                                        {{ $subject[$schedule['record']['subject']] }}
                                    </div>
                                    <div class="pt-1 pl-2 card-title">
                                        {{ $schedule['record']['name'] }}
                                    </div>
                                </div>
                                <div class="col-12 mt-3 pl-3 card-info">
                                    <div>{{ nl2br($schedule['record']['detail']) }}</div>
                                    <div class="mt-4">学習予定時間：{{ $schedule['scheduled_seconds'] }}</div>
                                    <div class="">復習予定日：{{ date('Y年m月d日', strtotime($schedule['schedule'])) }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @if (!empty($on_schedule))
            <div class="card col-lg-6 col-md-8 col-12 bg-success mx-auto">
                <div class="card-header fs-1">本日予定されている課題です</div>
                <div class="card-body">
                    @foreach($on_schedule as $schedule)
                    <a href="#">
                        <div class="card bg-white">
                            <div class="card-body position-relative pt-2 pl-0">
                                <div class="col-12 d-flex flex-row">
                                    <div class="subject-icon icon-{{$schedule['record']['subject']}}">
                                        {{ $subject[$schedule['record']['subject']] }}
                                    </div>
                                    <div class="pt-1 pl-2 card-title">
                                        {{ $schedule['record']['name'] }}
                                    </div>
                                </div>
                                <div class="col-12 mt-3 pl-3 card-info">
                                    <div>{{ nl2br($schedule['record']['detail']) }}</div>
                                    <div class="mt-4">学習予定時間：{{ $schedule['scheduled_seconds'] }}</div>
                                    <div class="">復習予定日：{{ date('Y年m月d日', strtotime($schedule['schedule'])) }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        @else
            <p>本日、学習が予定されている項目はありません。</p>
        @endif
    </div>
    <footer class="col-12 py-4"></footer>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop