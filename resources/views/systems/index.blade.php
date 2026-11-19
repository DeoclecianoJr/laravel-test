@extends('layouts.app')

@section('title', 'Sistemas')

@section('content')
    <h1>Sistemas</h1>
    <p><a class="btn btn-primary" href="{{ route('systems.create') }}">Novo sistema</a></p>

    <table>
        <thead>
            <tr><th>Nome</th><th>URL</th><th>Ativo</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @forelse ($systems as $system)
            <tr>
                <td>{{ $system->name }}</td>
                <td>{{ $system->url ?? '—' }}</td>
                <td>{{ $system->active ? 'Sim' : 'Não' }}</td>
                <td>
                    <a class="btn" href="{{ route('systems.show', $system) }}">Ver</a>
                    <a class="btn" href="{{ route('systems.edit', $system) }}">Editar</a>
                    <form class="inline" method="POST" action="{{ route('systems.destroy', $system) }}"
                          onsubmit="return confirm('Excluir este sistema?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Nenhum sistema cadastrado.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $systems->links() }}
@endsection
