@extends('layouts.app')

@section('title','商品登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<h2>商品登録</h2>

<form action="/products/register" method="post" enctype="multipart/form-data">
    @csrf
<!-- 商品名 -->
    <div>
        <label>商品名</label>
        <span>必須</span>
        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
        @error('name')
            {{ $message }}
        @enderror
    </div>
<!-- 値段 -->
    <div>
        <label>値段</label>
        <span>必須</span>
        <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
        @error('price')
            {{ $message }}
        @enderror
    </div>
<!-- 商品画像 -->
    <div>
        <label>商品画像</label>
        <span>必須</span>
        <input type=file name="image" placeholder="ファイルを選択">
        @error('image')
            {{ $message }}
        @enderror
    </div>
<!-- 季節（複数選択可） -->
    <div>
        <label>季節
            <span>必須</span>
            <span>複数選択可</span>
            <label class="circle-check">
            <input type="checkbox" name="season" value="spring">春
        </label>
        <label>
            <label class="circle-check">
            <input type="checkbox" name="season" value="summer">夏
        </label>
        <label>
            <label class="circle-check">
            <input type="checkbox" name="season" value="autumn">秋
        </label>
        <label>
            <label class="circle-check">
            <input type="checkbox" name="season" value="winter">冬
        </label>
        @error('season')
            {{ $message }}
        @enderror
    </div>
<!-- 商品説明 -->
    <div>
        <label>商品説明</label>
        <span>必須</span>
        <textarea name="description" placeholder="商品説明を入力">{{old('description')}}</textarea>
        @error('description')
            {{ $message }}
        @enderror
    </div>

    <br>

    <a href="/products" class="btn">戻る</button>
    <button type="submit" name="submit">登録</button>


</form>

@endsection