<?php

namespace MTC\Moedas\Tipos\Interfaces;

interface IMoedas
{
    /**
     * Retorna os tipos de moedas de acordo com a moeda de um país
     *
     * @return array
     */
    public function get() : array;
}
