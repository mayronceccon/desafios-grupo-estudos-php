<?php

namespace MTC\Moedas;

abstract class Dinheiro
{
    abstract public function obterValores() : array;

    public function __construct(\MTC\Moedas\Tipos\Interfaces\ITipos $tipoMoeda)
    {
        $this->tipoMoeda = $tipoMoeda;
    }

    public function getSimbolo() : string
    {
        return $this->tipoMoeda->getSimbolo();
    }
}
