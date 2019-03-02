<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $regras = [
        //     'nome' => 'required|min:5|max:10|unique:clientes',
        //     'idade' => 'required',
        //     'email' => 'required|email',
        //     'endereco' => 'required'
        // ];

        // $mensagens = [
        //     'required' => 'Campo :attribute obragatório!',
        //     'email' => 'Campo :attribute tem que ser email!'
        // ];

        // $mensagens = [
        //     'nome.required' => 'O campo \'Nome\' é requerido',
        //     'nome.min' => 'Campo \'Nome\' mínio de caracteres 5',
        //     'nome.max' => 'Campo \'Nome\' máximo de caracteres 10',
        //     'idade.required' => 'O campo \'Idade\' é requerido',
        //     'email.required' => 'O campo \'Email\' é requerido',
        //     'email.email' => 'Campo \'Email\' sa poha não é um Email valido',
        //     'endereco.required' => 'O campo \'Endereco\' é requerido',
        // ];

        // $request->validate(
        //     $regras, $mensagens
        // );

        $request->validate([
            'nome' => 'required|min:5|max:10|unique:clientes',
            'idade' => 'required',
            'email' => 'required|email',
            'endereco' => 'required'
        ], 
        $mensagens = [
            'required' => 'Campo :attribute obragatório!',
            'email' => 'Campo :attribute tem que ser email!'
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->email = $request->input('email');
        $cliente->endereco = $request->input('endereco');
        $cliente->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
