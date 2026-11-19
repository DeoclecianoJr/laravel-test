@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
    <h1>Áreas</h1>
    <p><a class="btn btn-primary" href="{{ route('areas.create') }}">Nova área</a></p>

    <table>
        <thead>
            <tr><th>Nome</th><th>Ativo</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @forelse ($areas as $area)
            <tr>
                <td>{{ $area->name }}</td>
                <td>{{ $area->active ? 'Sim' : 'Não' }}</td>
                <td>
                    <a class="btn" href="{{ route('areas.show', $area) }}">Ver</a>
                    <a class="btn" href="{{ route('areas.edit', $area) }}">Editar</a>
                    <form class="inline" method="POST" action="{{ route('areas.destroy', $area) }}"
                          onsubmit="return confirm('Excluir esta área?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Nenhuma área cadastrada.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $areas->links() }}
@endsection
