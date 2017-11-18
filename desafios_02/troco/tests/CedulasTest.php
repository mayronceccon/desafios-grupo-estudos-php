<?php

namespace Test;

class CedulasTest extends \PHPUnit\Framework\TestCase
{
    public function testRetornoDeCedulasReais()
    {
        $esperado = array(
            100.00,
            50.00,
            20.00,
            10.00,
            5.00,
            2.00
        );

        $cedulas = new \MTC\Moedas\Cedulas(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $cedulas->obterValores();

        $this->assertEquals($esperado, $resultado);
    }

    public function testSimboloRealCedulas()
    {
        $esperado = 'R$';

        $cedulas = new \MTC\Moedas\Cedulas(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $cedulas->getSimbolo();

        $this->assertEquals($esperado, $resultado);
    }
}
