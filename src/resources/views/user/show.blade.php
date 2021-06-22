@extends('layouts.app')


@section('css')
<link href="{{ asset('css/user/show.css') }}" rel="stylesheet">
@endsection

@include('common.header')
@section('content')
<div class="mt-5 card user-show">
    <div class="card-header text-center font-weight-bold h3">
        マイページ
    </div>
    <div class="card-body">
        <dl class="row justify-content-center">
            <dt>名前</dt>
            <dd>{{ auth()->user()->name }}</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>期生</dt>
            <dd>{{ auth()->user()->term }}期生</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>メールアドレス</dt>
            <dd>{{ auth()->user()->email }}</dd>
        </dl>
        <div class="row my-5 show-btn justify-content-center">
            <a href="/" class="d-inline-block btn btn-secondary">戻る</a>
            @if(Auth::id() === auth()->user()->id)
                <a href="#" class="d-inline-block btn btn-success"><i class="far fa-edit mr-1"></i></i>編集</a>
            @endif
        </div>
    </div>
</div>
<div class="my-5 text-center font-weight-bold h3">
    自分の投稿
</div>
<div class="row my-5 justify-content-start">
    @if (auth()->user()->articles->count())
        @foreach (auth()->user()->articles as $article)
            @if($loop->iteration < 2)
            <div class="card col-12 card-item">
            @else
            <div class="card col-12 mt-5 card-item">
            @endif
                <div class="card-header font-weight-bold row mx-1">
                    <div>
                        <i class="fas fa-user-alt mr-2"></i>投稿日：{{ $article->created_at->format('Y-n-j') }}
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('articles.edit', ['article' => $article]) }}" class="btn btn-secondary">編集</a>
                        <a href="" class="btn btn-danger">削除</a>
                    </div>
                </div>
                <div class="card-body m-5">
                    <dl class="row justify-content-center">
                        <dt class="text-right w-25">タイトル</dt>
                        <dd class="ml-5 w-50">{{ $article->title }}</dd>
                    </dl>
                    <dl class="row justify-content-center mt-5">
                        <dt class="text-right w-25">記事概要</dt>
                        <dd class="ml-5 w-50">{{ $article->summary }}</dd>
                    </dl>
                    <dl class="row justify-content-center mt-5">
                        <dt class="text-right w-25">URL</dt>
                        <dd class="ml-5 w-50"><a href="{{ $article->url }}">{{ $article->url }}</a></dd>
                    </dl>
                    <div class="row justify-content-center mt-5">
                        <a href="{{ route('articles.show', ['article' => $article]) }}" class="px-5 py-3 d-inline-block btn btn-success font-weight-bold">詳細を見る</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="mx-auto mt-5 font-weight-bold h5">記事はありません。。。</p>
    @endif
</div>
@endsection