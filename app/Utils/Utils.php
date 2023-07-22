<?php

namespace App\Utils;

class Utils
{
    public static function arrayAnos()
    {

        $arr = [];
        for ($ano = 2023; $ano >= 1970; $ano--) {
            $arr[] = $ano;
        }
        return $arr;
    }

    public static function getCores()
    {
        return [
            'Branco',
            'Preto',
            'Vermelho',
            'Prata',
            'Cinza',
            'Azul',
            'Verde',
            'Amarelo',
            'Laranja',
            'Marrom',
            'Bordo',
            'Rosa',
            'Fantasia'
        ];
    }
}
