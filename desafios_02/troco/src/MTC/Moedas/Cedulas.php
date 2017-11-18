<?php

namespace MTC\Moedas;

class Cedulas extends Dinheiro
{
    public function obterValores() : array
    {
        return $this->tipoMoeda->obterValores('cedulas');
    }
}
