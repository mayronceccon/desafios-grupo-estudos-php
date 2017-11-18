<?php

namespace Test;

class MoedasTest extends \PHPUnit\Framework\TestCase
{
    public function testRetornoDeMoedasReais()
    {
        $esperado = array(
            1.00,
            0.50,
            0.25,
            0.10,
            0.05,
            0.01
        );

        $moedas = new \MTC\Moedas\Moedas(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $moedas->obterValores();

        $this->assertEquals($esperado, $resultado);
    }

    public function testSimboloRealMoeda()
    {
        $esperado = 'R$';

        $moedas = new \MTC\Moedas\Moedas(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $moedas->getSimbolo();

        $this->assertEquals($esperado, $resultado);
    }
}
