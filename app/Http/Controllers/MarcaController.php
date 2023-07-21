<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    
    public function index()
    {
        $marcas = Marca::get();
        $arrayProps = [
            'marcas' => $marcas
        ];
        return view('marcas.index', $arrayProps);
    }

    public function store(Request $request){
        try{
            $marca = new Marca();
            $marca->nome = $request->nome;
            $marca->save();

            return redirect()->route('marcas');
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function edit(Request $request){
        return true;
    }
}
