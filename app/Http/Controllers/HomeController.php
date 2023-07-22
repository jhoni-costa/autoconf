<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $veiculos = Veiculo::with('marca', 'modelo', 'fotos')
        ->where(['ativo' => 1])
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $arrayProps = [
            'veiculos' => $veiculos
        ];
        return view('home', $arrayProps);
    }
}
