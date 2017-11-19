<?php

namespace MTC\Moedas\Tipos\Interfaces;

interface ICedulas
{
    /**
     * Retorna os tipos de cédulas de acordo com a moeda de um país
     *
     * @return array
     */
    public function get() : array;
}
