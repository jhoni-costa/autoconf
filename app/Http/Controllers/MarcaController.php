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

    public function edit(Request $request){
        return true;
    }
}
