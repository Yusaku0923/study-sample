@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <div>

    </div> --}}
    <h1>Dashboard</h1>
    <div class="col-12 text-center mt-3">
        <button class="col-8 btn btn-primary">新規作成</button>
    </div>
@stop

@section('content')
    <div class="col-12 mt-3">
        <p>本日の学習予定表は以下の通りです。</p>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop