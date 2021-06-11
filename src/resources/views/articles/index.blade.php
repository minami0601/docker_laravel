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
                <select class="form-control" id="categoryNumber">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-form-label mr-3" style="width: 100px;">カテゴリー</label>
            <div class="">
                <select class="form-control" id="categoryNumber">
                    <option></option>
                    <option>PHP</option>
                    <option>Laravel</option>
                    <option>Docker</option>
                    <option>Web基礎</option>
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
    <div class="card col-5 mx-auto">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="card col-5 mx-auto">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
@endsection