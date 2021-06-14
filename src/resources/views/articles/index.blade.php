@extends('layouts.app')


@section('css')
<link href="{{ asset('css/articles.css') }}" rel="stylesheet">
@endsection

@include('common.header')
@section('content')
<div class="serch_form w-auto  my-5">
    <form class="text-right mx-auto" style="width: 310px;">
        <div class="form-group row">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">期生</label>
            <div class="">
                <select class="form-control" id="categoryNumber" name="term">
                    <option></option>
                    @foreach ($deta['termsList'] as $key => $term)
                        <option value="{{ $term }}">{{ $term }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">カテゴリー</label>
            <div class="">
                <select class="form-control" id="categoryNumber" name="category_id">
                    <option></option>
                    @foreach ($deta['categoriesList'] as $key => $name)
                        <option value="{{ $key }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">フリーワード</label>
            <div class="w-auto">
                <input type="text" class="form-control" id="staticEmail" value="">
            </div>
        </div>
        <div class="serch_button mt-4 text-center">
            <button type="button" class="btn btn-success" style="width: 110px;">検索</button>
        </div>
    </form>
</div>
<div class="row my-5">
    @foreach ($deta['articles'] as $article)
        @if($loop->iteration < 3)
        <div class="card col-5 mx-auto card-item">
        @else
        <div class="card col-5 mx-auto mt-5 card-item">
        @endif
            <div class="card-header font-weight-bold">
                <i class="fas fa-user-alt mr-2"></i>{{ $article->user->name }}
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
                    <a href="#" class="d-inline-block btn btn-success">詳細をみる</a>
                </div>
            </div>
        </div>
        
    @endforeach
</div>
@endsection