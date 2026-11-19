@extends('layouts.app')

@section('title', 'Editar área')

@section('content')
    <h1>Editar área</h1>
    <form method="POST" action="{{ route('areas.update', $area) }}">
        @method('PUT')
        @include('areas._form')
    </form>
@endsection
