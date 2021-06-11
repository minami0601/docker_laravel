@extends('layouts.app')


@section('css')
<link href="{{ asset('css/articles.css') }}" rel="stylesheet">
@endsection

@include('common.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold h3">記事投稿</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('articles.store')}}">
                        @csrf
                        <div class="text-center my-4"><span class="text-danger">(※)</span>は入力必須項目です。</div>

                        <div class="form-group w-75 mx-auto  mb-4">
                            <label for="title">記事タイトル<span class="text-danger">(※)</span></label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group w-75 mx-auto mb-4">
                            <p>カテゴリー<span class="text-danger">(※)</span></p>
                            <div class="form-check form-check-inline">

                                @foreach ($categories as $id => $category)
                                    <label class="form-check-label mr-1" for="category_{{ $id }}">{{ $category }}</label>
                                    <input class="form-check-input  mr-5" id="title" type="radio" name="category_id" value="{{ $id }}"  autocomplete="category_id" @if(old('category_id') == $id)  checked @endif>
                                @endforeach
                            </div>
                            <span class="text-danger d-inline-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>

                        </div>
                        <div class="form-group w-75 mx-auto  mb-4">
                            <label for="summary">記事概要<span class="text-danger">(※)</span></label>
                            <textarea name="summary" id="summary" cols="30" rows="10" class="form-control @error('summary') is-invalid @enderror">{{ old('summary') }}</textarea>
                            @error('summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group w-75 mx-auto">
                            <label for="url">記事URL<span class="text-danger">(※)</span></label>
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="url">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                投稿する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

