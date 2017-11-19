<?php

namespace MTC\Moedas\Tipos\Interfaces;

/**
 * Tipos de moedas de um país
 */
interface ITipos
{
    /**
     * Retorna as cédulas/moedas de acordo com o paramétro passado
     *
     * @param string $tipo
     * @return array
     */
    public function obterValores(string $tipo) : array;

    /**
     * Símbolo da moeda
     *
     * @return string
     */
    public function getSimbolo() : string;
}
