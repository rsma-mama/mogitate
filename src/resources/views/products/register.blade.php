@extends('layouts.app')

@section('title','商品登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>商品登録</h2>

<form action="/products/register" method="post" enctype="multipart/form-data">
    @csrf
<!-- 商品名 -->
    <div class="form-group">
        <div class="label-container">
            <label>商品名</label>
            <span class="label-required">必須</span>
        </div>
        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
        @error('name')
            <div class="product__alert--danger">
            {{ $message }}
            </div>
        @enderror
    </div>
<!-- 値段 -->
    <div class="form-group">
        <div class="label-container">
            <label>値段</label>
            <span class="label-required">必須</span>
        </div>
        <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
        @error('price')
            <div class="product__alert--danger">
                {{ $message }}
            </div>
        @enderror
    </div>
<!-- 商品画像 -->
    <div class="form-group">
        <div class="label-container">
            <label>商品画像</label>
            <span class="label-required">必須</span>
        </div>
        <input type=file name="image" placeholder="ファイルを選択">
        @error('image')
            <div class="product__alert--danger">
                {{ $message }}
            </div>
        @enderror
    </div>
<!-- 季節（複数選択可） -->
    <div class="form-group">
        <div class="label-container">
            <label>季節</label>
            <span class="label-required">必須</span>
            <span class="label-note">複数選択可</span>
        </div>
        <div class="checkbox-group">        
            <label class="circle-check">
                <input type="checkbox" name="season[]" value="1">春
            </label>
            <label class="circle-check">
                <input type="checkbox" name="season[]" value="2">夏
            </label>
            <label class="circle-check">
                <input type="checkbox" name="season[]" value="3">秋
            </label>
            <label class="circle-check">
                <input type="checkbox" name="season[]" value="4">冬
            </label>
        </div>
        @error('season')
            <div class="product__alert--danger">
                {{ $message }}
            </div>
        @enderror
    </div>
<!-- 商品説明 -->
    <div class="form-group">
        <div class="label-container">
            <label>商品説明</label>
            <span class="label-required">必須</span>
        </div>
        <textarea name="description" placeholder="商品説明を入力">{{old('description')}}</textarea>
        @error('description')
            <div class="product__alert--danger">
                {{ $message }}
            </div>
        @enderror
    </div>


    <br>
    <div class="btn-group">
        <a href="/products" class="btn-back">戻る</a>
        <button type="submit" name="submit" class="btn-submit">登録</button>
    </div>

</form>
</div>
@endsection