@extends('adminlte::page')

@section('title', '新規作成')

@section('content_header')
    <h1>新規作成</h1>
@stop

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('study_record.store') }}" class="form-horizontal" autocomplete="off">
                @csrf
                @method('POST')
                <div class="form-group row col-12">
                    <div class="col-12">
                        <div class="col-12">
                            <label for="name">課題名</label>
                        </div>
                        <div class="col-12">
                            <input class="py-2 px-2" name="name" type="text" style="width: 100%;" placeholder="例）英単語帳①">
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="col-12">
                            <label for="subject">教科</label>
                        </div>
                        <div class="col-12">
                            <select name="subject" class="py-2 px-2">
                                @foreach(config('subject.list') as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="col-12">
                            <label for="detail">詳細</label>
                        </div>
                        <div class="col-12">
                            <textarea class="py-2 px-2" name="detail" cols="40" rows="5" placeholder="例）英単語帳10～30ページ"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="col-12">
                            <label for="term">復習間隔</label>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <input class="py-1 px-2" type="text" name="term[]" style="width: 30%;" value="1">　日後
                            </div>
                            <div class="mb-2">
                                <input class="py-1 px-2" type="text" name="term[]" style="width: 30%;" value="7">　日後
                            </div>
                            <div class="mb-2">
                                <input class="py-1 px-2" type="text" name="term[]" style="width: 30%;" value="14">　日後
                            </div>
                            <div class="mb-2">
                                <input class="py-1 px-2" type="text" name="term[]" style="width: 30%;" value="30">　日後
                            </div>
                            <div class="mb-2">
                                <input class="py-1 px-2" type="text" name="term[]" style="width: 30%;" value="60">　日後
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4 text-right">
                        <button class="btn btn-primary" type="submit">開始</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="col-12 py-4"></footer>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop