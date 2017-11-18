<?php

namespace MTC\Moedas\Tipos\Real;

use MTC\Moedas\Tipos\Interfaces\IMoedas;

class Moedas implements IMoedas
{
    public function get() : array
    {
        $valores = array(
            1.00,
            0.50,
            0.25,
            0.10,
            0.05,
            0.01
        );
        arsort($valores);

        return $valores;
    }
}
