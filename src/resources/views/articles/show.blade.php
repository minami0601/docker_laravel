@extends('layouts.app')


@section('css')
<link href="{{ asset('css/article/show.css') }}" rel="stylesheet">
@endsection

@include('common.header')
@section('content')
<div class="mt-5 card article-show">
    <div class="card-header text-center font-weight-bold h3">
        記事詳細
    </div>
    <div class="card-body">
        <dl class="row justify-content-center">
            <dt>名前</dt>
            <dd>{{ $article->user->name }}</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>期生</dt>
            <dd>{{ $article->term }}期生</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>タイトル</dt>
            <dd>{{ $article->title }}</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>カテゴリー</dt>
            <dd>{{ $array_category[$article->category_id] }}</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>記事概要</dt>
            <dd>{{ $article->summary }}</dd>
        </dl>
        <dl class="row justify-content-center">
            <dt>URL</dt>
            <dd><a href="{{ $article->url }}">{{ $article->url }}</a></dd>
        </dl>

        <div class="row my-5 show-btn justify-content-center">
            <a href="/" class="d-inline-block btn btn-secondary">戻る</a>
            @auth
                <a href="{{ route('comments.create', ['article' => $article]) }}" class="d-inline-block btn btn-success"><i class="far fa-comment mr-1"></i>コメント</a>
                @if(Auth::id() === $article->user->id)
                    <a href="{{ route('articles.edit', ['article' => $article]) }}" class="d-inline-block btn btn-success"><i class="far fa-edit mr-1"></i>編集</a>
                    <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="py-3 ml-2 btn btn-danger" onClick="return Check()"><i class="far fa-trash-alt mr-1"></i>削除</button>
                    </form>
                @endif
            @endauth
        </div>
        <div class="show-comment">
            @if ($comments->count())
                @foreach ($article->comments as $comment) 
                    <dl class="row justify-content-center">
                        <dt>{{ $comment->user->name }}</dt>
                        <dd>{{ $comment->comment }}</dd>
                    </dl>
                @endforeach
            @else
                <div class="text-center mt-4">
                    <p class="mb-4">コメントはありません。</p>
                </div>
            
            @endif

        </div>
    </div>
</div>
@endsection