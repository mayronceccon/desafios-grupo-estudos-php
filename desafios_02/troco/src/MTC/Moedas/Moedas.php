<?php

namespace MTC\Moedas;

class Moedas extends Dinheiro
{
    public function obterValores() : array
    {
        return $this->tipoMoeda->obterValores('moedas');
    }
}
