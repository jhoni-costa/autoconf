<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Veiculo;
use App\Models\VeiculoFoto;
use App\Utils\Utils;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with('marca', 'modelo', 'fotos')->where(['ativo' => 1])->paginate(5);

        $arrayProps = [
            "veiculos" => $veiculos,
        ];
        return view('veiculos.index', $arrayProps);
    }

    public function new()
    {
        $marcas = Marca::where(['ativo' => 1])->get();

        $arrayProps = [
            'marcas' => $marcas,
            'arrayAnos'  => Utils::arrayAnos(),
            'cores' => Utils::getCores(),
        ];
        return view('veiculos.new', $arrayProps);
    }

    public function edit($id)
    {
        $veiculo = Veiculo::find($id);
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
            $this->validate($request, [
                // 'descricao' => 'required|string',
                // 'id_marca' => 'required|integer',
                // 'id_modelo' => 'required|integer',
                // 'preco' => 'required',
                // 'cor' => 'required|string',
                // 'ano_fabricacao' => 'required|string',
                // 'ano_modelo' => 'required|string',
                // 'placa' => 'required|string',
                // 'quilometragem' => 'required|string',
                'fotos' => 'required|array|max:6',
                'fotos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $veiculo = new Veiculo();
            $veiculo->id_marca = $request->id_marca;
            $veiculo->id_modelo = $request->id_modelo;
            $veiculo->descricao = $request->descricao;
            $veiculo->preco = $request->preco;
            $veiculo->cor = $request->cor;
            $veiculo->ano_fabricacao = $request->ano_fabricacao;
            $veiculo->ano_modelo = $request->ano_modelo;
            $veiculo->placa = $request->placa;
            $veiculo->quilometragem = $request->quilometragem;

            $veiculo->save();

            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $foto) {
                    $filename = time() . '-' . $foto->getClientOriginalName();
                    $foto->move(public_path('photos'), $filename);

                    $veiculoFoto = new VeiculoFoto();
                    $veiculoFoto->id_veiculo = $veiculo->id;
                    $veiculoFoto->nome = $foto->getClientOriginalName();
                    $veiculoFoto->url = "photos/" . $filename;
                    $veiculoFoto->save();
                }
            }

            return redirect()->route('veiculos');
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
}
