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
        $veiculo = Veiculo::with('marca', 'modelo', 'fotos')->find($id);
        $marcas = Marca::where(['ativo' => 1])->get();
        $modelos = Modelo::where(['id_marca' => $veiculo->id_marca, 'ativo' => 1])->get();

        $arrayProps = [
            'veiculo' => $veiculo,
            'modelos' => $modelos,
            'marcas' => $marcas,
            'arrayAnos'  => Utils::arrayAnos(),
            'cores' => Utils::getCores(),
        ];

        return view('veiculos.edit', $arrayProps);
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
            $veiculo = Veiculo::find($request->id);
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

            return redirect()->route('veiculos.edit', $request->id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete(Request $request)
    {
        $veiculo = Veiculo::find($request->id);
        $veiculo->ativo = 0;
        $veiculo->save();

        $fotos = VeiculoFoto::where(['id_veiculo' => $veiculo->id, 'ativo' => 1])->get();
        foreach($fotos as $foto){
            $foto->ativo = 0;
            $foto->save();
        }
    }

    public function addFotos(Request $request){
        try{

            $numFotos = (6 - count(VeiculoFoto::where(['id_veiculo' => $request->id_veiculo, 'ativo' => 1])->get()));
            // dd($numFotos);
            $this->validate($request, [
                'fotos' => "required|array|max:{$numFotos}",
                'fotos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $foto) {
                    $filename = time() . '-' . $foto->getClientOriginalName();
                    $foto->move(public_path('photos'), $filename);

                    $veiculoFoto = new VeiculoFoto();
                    $veiculoFoto->id_veiculo = $request->id_veiculo;
                    $veiculoFoto->nome = $foto->getClientOriginalName();
                    $veiculoFoto->url = "photos/" . $filename;
                    $veiculoFoto->save();
                }
            }
            return redirect()->route('veiculos.edit', $request->id_veiculo);
            }catch(\Exception $e){
                return response()->json(['error' => $e->getMessage()]);
            }
    }

    public function deleteFoto(Request $request){
        try{
            $foto = VeiculoFoto::find($request->id);
            $foto->ativo = 0;
            $foto->save();
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
