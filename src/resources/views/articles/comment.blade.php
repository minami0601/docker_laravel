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
                <div class="card-header text-center font-weight-bold h3">コメント</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('comments.store', ['article' => $article])}}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group w-75 mx-auto  mb-4">
                            <label for="comment">コメント<span class="text-danger">(※)</span></label>
                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                            <p>150字以内で入力してください</p>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                コメントする
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

