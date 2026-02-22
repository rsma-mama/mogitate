@extends('layouts.app')

@section('title','商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="container">

    <div class="sidebar">
        <div class="product__content">
            <h2>商品一覧</h2>
            <a href="/products/register" class="add-btn">＋商品追加</a>
        </div>

        <form class="form" action="/products/search" method="get">
            <!-- キーワード検索 -->
            <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
                <button type="submit">検索</button>
        
            <!-- 並び替え -->
            <h3>価格順で表示</h3>
            <select name="sort">
                <option value="">選択してください</option>
                <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
                <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>安い順に表示</option>
            </select>
        </form>
    </div>
    @if(request('sort'))
    <div class="sort-modal">
        {{request('sort') =='high' ? '高い順に表示' : '低い順に表示' }}

        <a href="/products/search?keyword{{request('keyword') }}">
        ⊗
        </a>
    </div>
    @endif

    <div class="product-area">
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <div class="product-grid">
            @foreach($products as $product)
                <div class="card">
                    <a href="products/{{ $product->id }}/update" class="card-link">    
                        <img src="{{ asset('storage/' . $product->image) }}">
                        <div class="card-info">
                            <div class="name">{{ $product->name }}</div>
                            <div class="price">¥{{ number_format($product->price) }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div> 

        {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection