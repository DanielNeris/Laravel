@extends('layouts.meulayout')

@section('minhaSessaoProdutos')
    @for ($i = 1; $i <= $n; $i++)
        <p>Número: {{$i}}</p>
    @endfor
@endsection