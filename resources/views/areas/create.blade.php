@extends('layouts.app')

@section('title', 'Nova área')

@section('content')
    <h1>Nova área</h1>
    <form method="POST" action="{{ route('areas.store') }}">
        @include('areas._form')
    </form>
@endsection
