<?php

namespace MTC\Moedas\Tipos\Real;

use MTC\Moedas\Tipos\Interfaces\ICedulas;

class Cedulas implements ICedulas
{
    public function get() : array
    {
        $valores = array(
            100.00,
            50.00,
            20.00,
            10.00,
            5.00,
            2.00
        );
        arsort($valores);

        return $valores;
    }
}
