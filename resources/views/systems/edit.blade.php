@extends('layouts.app')

@section('title', 'Editar sistema')

@section('content')
    <h1>Editar sistema</h1>
    <form method="POST" action="{{ route('systems.update', $system) }}">
        @method('PUT')
        @include('systems._form')
    </form>
@endsection
