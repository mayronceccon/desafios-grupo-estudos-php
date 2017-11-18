<?php

namespace MTC;

class Transacoes
{
    private $valorTotal;
    private $valorPagamento;
    private $diferenca;
    private $tipoMoeda;
    private $troco;

    public function __construct(\MTC\Moedas\Tipos\Interfaces\ITipos $tipoMoeda)
    {
        $this->tipoMoeda = $tipoMoeda;
        $this->troco = array();
    }

    public function pagamento(float $valorTotal, float $valorPagamento)
    {
        $this->valorTotal = $valorTotal;
        $this->valorPagamento = $valorPagamento;

        if ($this->temTroco()) {
            return $this->retornaTroco();
        }
    }

    private function temTroco()
    {
        $this->diferenca = $this->valorPagamento - $this->valorTotal;
        if ($this->diferenca > 0) {
            return true;
        }
        return false;
    }

    private function retornaTroco()
    {
        $this->trocoCedulas();
        $this->trocoMoedas();
        return $this->troco;
    }

    private function trocoCedulas()
    {
        $cedulas = new \MTC\Moedas\Cedulas($this->tipoMoeda);
        $retornoCedulas = $cedulas->obterValores();

        arsort($retornoCedulas);

        $this->valoresTroco($retornoCedulas);
    }

    private function trocoMoedas()
    {
        $moedas = new \MTC\Moedas\Moedas($this->tipoMoeda);
        $retornoMoedas = $moedas->obterValores();

        arsort($retornoMoedas);

        $this->valoresTroco($retornoMoedas);
    }

    private function valoresTroco($valores)
    {
        array_walk_recursive($valores, function ($item) use ($valores) {
            $this->diferenca = $this->arredondaValor($this->diferenca);

            if ($this->diferenca >= $item) {
                array_push($this->troco, $item);
                $this->diferenca -= $item;

                if ($this->diferenca >= $item) {
                    $this->valoresTroco($valores);
                }
            }
        });
    }

    private function arredondaValor($valor)
    {
        return round($valor, 2);
    }
}
