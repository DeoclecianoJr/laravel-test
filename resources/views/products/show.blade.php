@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <dl>
        <dt>Descrição</dt><dd>{{ $product->description ?? '—' }}</dd>
        <dt>Preço</dt><dd>R$ {{ number_format($product->price, 2, ',', '.') }}</dd>
        <dt>Estoque</dt><dd>{{ $product->stock }}</dd>
    </dl>
    <a class="btn" href="{{ route('products.edit', $product) }}">Editar</a>
    <a class="btn" href="{{ route('products.index') }}">Voltar</a>
@endsection
