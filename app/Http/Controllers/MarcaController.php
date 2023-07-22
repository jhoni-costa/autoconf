<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    public function index()
    {
        $marcas = Marca::where(['ativo' => 1])->paginate(5);
        $arrayProps = [
            'marcas' => $marcas
        ];
        return view('marcas.index', $arrayProps);
    }

    public function edit($id){
        $marca = Marca::find($id);
        $arrayProps = [
            'marca' => $marca
        ];
        return view('marcas.edit', $arrayProps);
    }

    public function store(Request $request){
        try{
            $marca = new Marca();
            $marca->nome = $request->nome;

            if($request->hasFile('file_logo')){
                $photo = $request->file('file_logo');
                $filename = time() . "." . $photo->getClientOriginalExtension();
                $photo->move(public_path('photos'), $filename);
            }
            $marca->url_logo = 'photos/'. $filename;
            $marca->save();

            return redirect()->route('marcas');
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function update(Request $request){
        try{
            $marca = Marca::find($request->id);
            $marca->nome = $request->nome;

            if($request->hasFile('file_logo')){
                $photo = $request->file('file_logo');
                $filename = time() . "." . $photo->getClientOriginalExtension();
                $photo->move(public_path('photos'), $filename);
                $marca->url_logo = 'photos/'. $filename;
            }

            $marca->save();

            return redirect()->route('marcas');
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function delete(Request $request){
        $marca = Marca::find($request->id);
        $marca->ativo = 0;
        $marca->save();
    }

}
