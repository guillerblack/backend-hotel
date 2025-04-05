<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Aplicar middleware de autenticación a todas las funciones del controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el dashboard de la aplicación.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }
}
