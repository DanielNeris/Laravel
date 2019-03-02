@extends('layouts.app')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h2>Você está logado</h2>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{ Auth::user()->name }}</h4>
                        <p> id: {{ Auth::user()->id }}</p>
                        <p class="mb-0">email: {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Você não está logado</h4>
                      <p></p>
                      <p class="mb-0">Loga ai namoral</p>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
