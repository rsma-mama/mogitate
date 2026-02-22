@extends('layouts.app')

@section('title','商品更新')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')

<h2>商品詳細</h2>

<form action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
    @csrf
<!-- 商品名 -->
    <div>
        <label>商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>
<!-- 値段 -->
    <div>
        <label>値段</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}">
    </div>
<!-- 現在の画像 -->
    <div>
        <img src="{{ asset('storage/' . $product->image) }}">
    </div>
<!-- 画像変更 -->
    <div>
        <input type="file" name="image">
    </div>
<!-- 季節 -->
    <div>
        <label>季節</label><br>
        
        @foreach($seasons as $season)
            <label>
                <input type="checkbox" name="season[]" value="{{ $season->id }}" {{ in_array($season->id, old('season', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                {{ $season->name }}
            </label>
        @endforeach
    </div>
<!-- 商品説明 -->
    <div>
        <label>商品説明</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <br>

    <a href="/products">戻る</a>
    <button type="submit">変更を保存</button>
</form>
<!-- 削除フォーム -->
<form action="/products/{{ $product->id }}/delete" method="post">
    @csrf
    <button type="submit" class="delete-btn">🗑️</button>
</form>

@endsection