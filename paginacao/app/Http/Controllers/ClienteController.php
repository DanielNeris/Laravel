<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{

    public function index()
    {
        //$clientes = Cliente::all();
        $clientes = Cliente::paginate(10);
        return View('index', compact('clientes'));
    }

    public function indexJs()
    {
        return View('indexjs');
    }

    public function indexJson()
    {
        return Cliente::paginate(10);
    }


}
