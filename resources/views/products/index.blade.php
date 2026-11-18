@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Produtos</h1>
    <p><a class="btn btn-primary" href="{{ route('products.create') }}">Novo produto</a></p>

    <table>
        <thead>
            <tr><th>Nome</th><th>Preço</th><th>Estoque</th><th>Ações</th></tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a class="btn" href="{{ route('products.show', $product) }}">Ver</a>
                    <a class="btn" href="{{ route('products.edit', $product) }}">Editar</a>
                    <form class="inline" method="POST" action="{{ route('products.destroy', $product) }}"
                          onsubmit="return confirm('Excluir este produto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
@endsection
