<?php

namespace MTC\Moedas\Tipos\Real;

use MTC\Moedas\Tipos\Interfaces\ITipos;

class Real implements ITipos
{
    public function getSimbolo() : string
    {
        return 'R$';
    }

    public function obterValores(string $tipo) : array
    {
        if ($tipo == 'cedulas') {
            $cedulas = new Cedulas();
            return $cedulas->get();
        }

        if ($tipo == 'moedas') {
            $moedas = new Moedas();
            return $moedas->get();
        }
    }
}
