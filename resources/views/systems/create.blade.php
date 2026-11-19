@extends('layouts.app')

@section('title', 'Novo sistema')

@section('content')
    <h1>Novo sistema</h1>
    <form method="POST" action="{{ route('systems.store') }}">
        @include('systems._form')
    </form>
@endsection
