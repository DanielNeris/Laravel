@extends('layouts.meulayout')

@section('minhaSessaoProdutos')
    @if (isset($palavra))
        Palavra: {{$palavra}}
    @endif
@endsection