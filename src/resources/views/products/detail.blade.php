@extends('layouts.app')

@section('title','商品詳細')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="container">
    
    <nav class="breadcrumb">
        <a href="/products">商品一覧</a>
        <span>&gt;</span>
        <span class="current-product">{{ $product->name }}</span>
    </nav>

    <form action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="detail-flex-container">

            <div class="detail-image-area">
                <img src="{{ asset('storage/' . $product->image) }}" class="product-image">
                
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="image-input">
                    <span id="file-name-display" class="file-name-text">
                        {{ basename($product->image) }}
                    </span>
                </div>
            </div>

            <div class="detail-form-area">
            <!-- 商品名 -->
                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}">
                </div>
            <!-- 値段 -->
                <div class="form-group">
                    <label>値段</label>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}">
                </div>
            <!-- 季節 -->
                <div class="form-group">
                    <label>季節</label>
                    <div class="checkbox-group">
                        @foreach($seasons as $season)
                        <label class="circle-check">
                            <input type="checkbox" name="season[]" value="{{ $season->id }}"
                                {{ in_array($season->id, old('season', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                            {{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <!-- 商品説明 -->
        <div class="form-group description-group">
            <label>商品説明</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>
    </form>

    <div class="action-group">
        <div class="btn-group">
            <a href="/products" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">変更を保存</button>
        </div>
    <!-- 削除ボタン -->
        <form action="/products/{{ $product->id }}/delete" method="post" class="delete-form">
            @csrf
        <button type="submit" class="delete-btn">🗑️</button>
        </form>
    </div>
</div>

@endsection