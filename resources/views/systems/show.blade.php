@extends('layouts.app')

@section('title', $system->name)

@section('content')
    <h1>{{ $system->name }}</h1>
    <dl>
        <dt>Descrição</dt><dd>{{ $system->description ?? '—' }}</dd>
        <dt>URL</dt><dd>{{ $system->url ?? '—' }}</dd>
        <dt>Ativo</dt><dd>{{ $system->active ? 'Sim' : 'Não' }}</dd>
    </dl>
    <a class="btn" href="{{ route('systems.edit', $system) }}">Editar</a>
    <a class="btn" href="{{ route('systems.index') }}">Voltar</a>
@endsection
