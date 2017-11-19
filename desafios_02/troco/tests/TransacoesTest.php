<?php

class TransacoesTest extends \PHPUnit\Framework\TestCase
{
    public function testPagamentosReal1()
    {
        $esperado = array(
            50.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(150.00, 200.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosReal2()
    {
        $esperado = array(
            20.00,
            5.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(175.00, 200.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosReal3()
    {
        $esperado = array(
            20.00,
            5.00,
            2.00,
            2.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(175.00, 204.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosReal4()
    {
        $esperado = array(
            20.00,
            10.00,
            0.50
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(175.00, 205.50);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosReal5()
    {
        $esperado = array(
            20.00,
            20.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(120.00, 160.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosReal6()
    {
        $esperado = array(
            20.00,
            20.00,
            5.00,
            0.50,
            0.10,
            0.05,
            0.01
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Real\Real);
        $resultado = $transacoes->pagamento(175.00, 220.66);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosEuros1()
    {
        $esperado = array(
            500.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Euros\Euros);
        $resultado = $transacoes->pagamento(500.00, 1000.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosEuros2()
    {
        $esperado = array(
            50.00,
            20.00,
            5.00
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Euros\Euros);
        $resultado = $transacoes->pagamento(175.00, 250.00);

        $this->assertEquals($esperado, $resultado);
    }

    public function testPagamentosEuros3()
    {
        $esperado = array(
            20.00,
            2.00,
            2.00,
            0.20,
            0.10,
            0.02,
            0.02
        );

        $transacoes = new \MTC\Transacoes(new \MTC\Moedas\Tipos\Euros\Euros);
        $resultado = $transacoes->pagamento(175.66, 200.00);

        $this->assertEquals($esperado, $resultado);
    }
}
