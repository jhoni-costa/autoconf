<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'id_marca',
        'id_modelo',
        'preco',
        'cor',
        'ano_fabricacao',
        'ano_modelo',
        'placa',
        'quilometragem',
    ];

    public function marca(){
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }

    public function fotos(){
        return $this->hasMany(VeiculoFoto::class, 'id_veiculo')->where('ativo', 1);
    }
}
