<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 25/02/16
 * Time: 16:54
 */

namespace App\Models\Eloquent\CustomTraits;

trait CostAllocateEloquentTrait
{
    /**
     * Get the value of numero.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get the value of nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the value of descricao.
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

}