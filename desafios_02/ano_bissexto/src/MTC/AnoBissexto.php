<?php

namespace MTC;

use InvalidArgumentException;

/**
 * Classe para verificar se um ano é bissexto
 * @author Mayron Ceccon <mayron.ceccon@gmail.com>
 */
class AnoBissexto
{
    private $ano;

    /**
     * __construct
     * @param int $ano
     * @return void
     */
    public function __construct(int $ano)
    {
        if (empty($ano) or !is_numeric($ano)) {
            throw new InvalidArgumentException('Ano inválido.');
        }
        $this->ano = (int) $ano;
    }

    /**
     * Retorna um boleano verificando se o número é ou não bissexto
     * @return bool
     */
    public function isBissexto() : bool
    {
        return $this->regraAnoBissexto();
    }

    /**
     * Aplica a regra para verificar se o ano é bissexto
     * @return bool
     */
    private function regraAnoBissexto() : bool
    {
        if (($this->divisivelPorQuatro() and !$this->divisivelPorCem()) or $this->divisivelPorQuatrocentos()) {
            return true;
        }
        return false;
    }

    /**
     * Verifica se ano é divisível por 4 (quatro)
     * @return bool
     */
    private function divisivelPorQuatro() : bool
    {
        if ($this->ano % 4 != 0) {
            return false;
        }
        return true;
    }

    /**
     * Verifica se ano é divisível por 100 (cem)
     * @return bool
     */
    private function divisivelPorCem() : bool
    {
        if ($this->ano % 100 != 0) {
            return false;
        }
        return true;
    }

    /**
     * Verifica se ano é divisível por 400 (quatrocentos)
     * @return bool
     */
    private function divisivelPorQuatrocentos() : bool
    {
        if ($this->ano % 400 != 0) {
            return false;
        }
        return true;
    }
}
