@extends('layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1>Editar produto</h1>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @method('PUT')
        @include('products._form')
    </form>
@endsection
