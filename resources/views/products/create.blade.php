@extends('layouts.app')

@section('title', 'Novo produto')

@section('content')
    <h1>Novo produto</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @include('products._form')
    </form>
@endsection
