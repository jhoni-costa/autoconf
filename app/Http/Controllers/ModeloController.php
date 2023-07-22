<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::with('marca')->where(['ativo' => 1])->orderBy('created_at', 'desc')->paginate(5);
        $marcas = Marca::where(['ativo' => 1])->get();

        $arrayProps = [
            'modelos' => $modelos,
            'marcas' => $marcas
        ];
        return view('modelos.index', $arrayProps);
    }

    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marcas = Marca::where(['ativo' => 1])->get();

        $arrayProps = [
            'modelo' => $modelo,
            'marcas' => $marcas
        ];
        return view('modelos.edit', $arrayProps);
    }

    public function store(Request $request)
    {
        try {
            $modelo = new Modelo();
            $modelo->nome = $request->nome;
            $modelo->id_marca = $request->id_marca;

            $modelo->save();

            return redirect()->route('modelos');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(Request $request)
    {
        try {
            $modelo = Modelo::find($request->id);
            $modelo->nome = $request->nome;
            $modelo->id_marca = $request->id_marca;

            $modelo->save();

            return redirect()->route('modelos');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete(Request $request)
    {
        $modelo = Modelo::find($request->id);
        $modelo->ativo = 0;
        $modelo->save();
    }

    public function modelos(Request $request)
    {
        try {
            $modelos = Modelo::where(['id_marca' => $request->id_marca, 'ativo' => 1])->get();
            $arrayProps = [
                'modelos' => $modelos,
            ];
            return view('modelos.select-modelos', $arrayProps);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
