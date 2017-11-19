<?php

namespace MTC\Moedas\Tipos\Euros;

use MTC\Moedas\Tipos\Interfaces\ITipos;

class Euros implements ITipos
{
    public function getSimbolo() : string
    {
        return '€';
    }

    public function obterValores(string $tipo) : array
    {
        if ($tipo == 'moedas') {
            return $this->valoresDeMoedas();
        }

        if ($tipo == 'cedulas') {
            return $this->valoresDeCedulas();
        }
    }

    private function valoresDeCedulas() : array
    {
        $cedulas = new Cedulas();
        return $cedulas->get();
    }

    private function valoresDeMoedas() : array
    {
        $moedas = new Moedas();
        return $moedas->get();
    }
}
