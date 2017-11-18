<?php

namespace MTC\Moedas\Tipos\Interfaces;

interface ITipos
{
    public function obterValores(string $tipo) : array;
    public function getSimbolo() : string;
}
