@extends('layouts.app')


@section('css')
<link href="{{ asset('css/articles.css') }}" rel="stylesheet">
@endsection

@include('common.header')
@section('content')
<div class="serch_form w-100  my-5">
    <form method="GET" class="text-right mx-auto" style="width: 400px;" action="{{ route('articles.search') }}">
        @csrf
        <div class="form-group row  justify-content-start">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">期生</label>
            <div class="">
                <select class="form-control" id="categoryNumber" name="term">
                    <option></option>
                    @foreach ($termsList as $key => $term)
                        <option value="{{ $term }}" @if(old('term', $pagenate_params['term'] ?? '') == $term) selected @endif>{{ $term }}</option>
                    @endforeach
                </select>
                @error('term')
                    <span class="invalid-feedback text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row  justify-content-start">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">カテゴリー</label>
            <div class="">
                <select class="form-control mr-auto" id="categoryNumber" name="category_id">
                    <option></option>
                    @foreach ($categoriesList as $key => $name)
                        
                        <option value="{{ $key }}" @if(old('category_id', $pagenate_params['category_id'] ?? '') == $key) selected @endif>{{ $name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row  justify-content-start">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">フリーワード</label>
            <div class="" >
                <input name="word" type="text" class="form-control @error('word') is-invalid @enderror" id="staticEmail" value="{{ $pagenate_params['word'] ?? ''}}">
                @error('word')
                    <span class="invalid-feedback text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <button type="submit" class="btn btn-success" style="width: 110px;">検索</button>
        </div>
    </form>
</div>
<div class="container">
    <div class="row justify-content-end">
        <form id='csvform' action="{{ route('csv.export') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">CSVインポート</button>
        </form>
    </div>
</div>
<div class="row my-5 justify-content-start">
    @if ($articles->count())
        @foreach ($articles as $article)
            @if($loop->iteration < 3)
            <div class="card col-5 ml-5 card-item">
            @else
            <div class="card col-5 ml-5 mt-5 card-item">
            @endif
                <div class="card-header font-weight-bold d-flex align-items-center">
                    <div>
                        <i class="fas fa-user-alt mr-2"></i>{{ $article->user->name }}
                    </div>
                    @if(Auth::id() === $article->user->id)
                        <div class="d-flex btn ml-auto">
                            <div class="mr-2">
                                <a class="btn btn-secondary" href="{{ route('articles.edit', ['article' => $article]) }}"><i class="far fa-edit mr-1"></i>編集</a>
                            </div>
                            <form name="deleteform" method="POST" action="{{ route('articles.destroy', $article->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger d-inline" onClick="return Check()"><i class="far fa-trash-alt mr-1"></i>削除</button>
                            </form>
        
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <dl class="d-flex">
                        <dt class="w-25">期生</dt>
                        <dd class="ml-5 w-50">{{ $article->user->term }}期</dd>
                    </dl>
                    <dl class="d-flex">
                        <dt class="w-25">タイトル</dt>
                        <dd class="ml-5 w-50">{{ $article->title }}</dd>
                    </dl>
                    <dl class="d-flex">
                        <dt class="w-25">記事概要</dt>
                        <dd class="ml-5 w-50">{{ $article->summary }}</dd>
                    </dl>
                    <dl class="d-flex">
                        <dt class="w-25">URL</dt>
                        <dd class="ml-5 w-50"><a href="{{ $article->url }}">{{ $article->url }}</a></dd>
                    </dl>
                    <dl class="d-flex">
                        <dt class="w-25">投稿日</dt>
                        <dd class="ml-5 w-50">{{ $article->created_at->format('Y年n月j日') }}</dd>
                    </dl>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('articles.show', ['article' => $article]) }}" class="d-inline-block btn btn-success">詳細をみる</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="mx-auto mt-5 font-weight-bold h5">記事はありません。。。</p>
    @endif
</div>
<div class="row justify-content-center">
    {{ $articles->appends($pagenate_params ?? '')->links('pagination::bootstrap-4') }}
</div>
@endsection
