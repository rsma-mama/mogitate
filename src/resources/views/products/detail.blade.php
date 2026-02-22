@extends('layouts.app')

@section('title','商品詳細')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<h2>{{$product->name}}</h2>

<img src="{{asset('storage/' . $product->image) }}">

<p>値段:{{ $product->price }}</p>
<div>
<label>季節:</label><br>
    @foreach($seasons as $season)
    <label>
        <input type="checkbox" name="season[]" value="{{ $season->id }}" 
            @if(in_array($season->id, old('season',$product->seasons->pluck('id')->toArray())))
                checked>
            @endif
            {{ $season->name }}

        <!-- {{ in_array($season->id, old('season', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
        {{ $season->name }} -->
    </label>
</div>