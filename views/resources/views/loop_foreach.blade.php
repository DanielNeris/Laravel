@extends('layouts.meulayout')

@section('minhaSessaoProdutos')
    <h1>Loop foreach array associativos</h1>
    @foreach ($produtos as $p)
        <p>Id: {{$p['id']}} - Nome: {{$p['nome']}}</p>
    @endforeach

    <hr>

    @foreach ($produtos as $p)
        <p>
            Id: {{$p['id']}} - Nome: {{$p['nome']}}

            @if ($loop->first)
                (primeiro)
            @endif

            @if ($loop->last)
                (ultimo)
            @endif

            <span class="badge badge-secondary">
                {{$loop->index}} / {{$loop->count}} / {{$loop->remaining}}
            </span>
            <span class="badge badge-danger">
                {{$loop->iteration}} / {{$loop->count}}
            </span>
        </p>
    @endforeach

@endsection