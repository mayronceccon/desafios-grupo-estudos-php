<?php

namespace MTC;

/**
 * Classe para trabalhar com as entradas e saidas de valores
 */
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

    /**
     * Verifica de acordo com os valores o que deve ser
     * retornado para o cliente
     *
     * @param float $valorTotal
     * @param float $valorPagamento
     * @return void
     */
    public function pagamento(float $valorTotal, float $valorPagamento)
    {
        $this->valorTotal = $valorTotal;
        $this->valorPagamento = $valorPagamento;

        if ($this->temTroco()) {
            return $this->retornaTroco();
        }
    }

    /**
     * Verifica se é necessário troco para o cliente
     *
     * @return void
     */
    private function temTroco()
    {
        $this->diferenca = $this->valorPagamento - $this->valorTotal;
        if ($this->diferenca > 0) {
            return true;
        }
        return false;
    }

    /**
     * De acordo com o valor faz o cálculo do troco necessário
     *
     * @return void
     */
    private function retornaTroco()
    {
        $this->trocoCedulas();
        $this->trocoMoedas();
        return $this->troco;
    }

    /**
     * Cálculo de cedúlas que devem ser entregues
     *
     * @return void
     */
    private function trocoCedulas()
    {
        $cedulas = new \MTC\Moedas\Cedulas($this->tipoMoeda);
        $retornoCedulas = $cedulas->obterValores();

        arsort($retornoCedulas);

        $this->valoresTroco($retornoCedulas);
    }

    /**
     * Cálculo de moedas que devem ser entregues
     *
     * @return void
     */
    private function trocoMoedas()
    {
        $moedas = new \MTC\Moedas\Moedas($this->tipoMoeda);
        $retornoMoedas = $moedas->obterValores();

        arsort($retornoMoedas);

        $this->valoresTroco($retornoMoedas);
    }

    /**
     * Percorre todas as cédulas/moedas possíveis para o troco
     *
     * @param array $valores
     * @return void
     */
    private function valoresTroco(array $valores)
    {
        array_walk_recursive($valores, function ($valor) use ($valores) {
            $this->buscaCedulasMoedasTroco($valor, $valores);
        });
    }

    /**
     * Cédulas/moedas que serão retornadas no troco
     *
     * @param float $valor
     * @param array $valores
     * @return void
     */
    private function buscaCedulasMoedasTroco(float $valor, array $valores)
    {
        $this->diferenca = $this->arredondaValor($this->diferenca);
        if ($this->diferenca >= $valor) {
            array_push($this->troco, $valor);
            $this->diferenca -= $valor;

            $this->mesmasCedulasMoedas($valor, $valores);
        }
    }

    /**
     * Busca novamente cédulas/moedas que podem ser iguais
     *
     * @param float $valor
     * @param array $valores
     * @return void
     */
    private function mesmasCedulasMoedas(float $valor, array $valores)
    {
        if ($this->diferenca >= $valor) {
            $this->valoresTroco($valores);
        }
    }

    /**
     * Arredonda valor para duas casas
     *
     * @param float $valor
     * @return void
     */
    private function arredondaValor(float $valor)
    {
        return round($valor, 2);
    }
}
