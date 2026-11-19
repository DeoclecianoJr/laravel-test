@extends('layouts.app')

@section('title', $area->name)

@section('content')
    <h1>{{ $area->name }}</h1>
    <dl>
        <dt>Descrição</dt><dd>{{ $area->description ?? '—' }}</dd>
        <dt>Ativo</dt><dd>{{ $area->active ? 'Sim' : 'Não' }}</dd>
    </dl>
    <a class="btn" href="{{ route('areas.edit', $area) }}">Editar</a>
    <a class="btn" href="{{ route('areas.index') }}">Voltar</a>
@endsection
