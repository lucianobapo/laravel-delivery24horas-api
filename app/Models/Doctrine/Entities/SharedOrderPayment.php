<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-02-25 22:56:30.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace App\Models\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * App\Models\Doctrine\Entities\SharedOrderPayment
 *
 * @ORM\Entity(repositoryClass="SharedOrderPaymentRepository")
 * @ORM\Table(name="shared_order_payments", indexes={@ORM\Index(name="shared_order_payments_pagamento_index", columns={"pagamento"})})
 */
class SharedOrderPayment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $pagamento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $descricao;

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="sharedOrderPayment")
     * @ORM\JoinColumn(name="id", referencedColumnName="payment_id", nullable=false)
     */
    protected $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of updated_at.
     *
     * @param \DateTime $updated_at
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of updated_at.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of deleted_at.
     *
     * @param \DateTime $deleted_at
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    /**
     * Get the value of deleted_at.
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of pagamento.
     *
     * @param string $pagamento
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;

        return $this;
    }

    /**
     * Get the value of pagamento.
     *
     * @return string
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * Set the value of descricao.
     *
     * @param string $descricao
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
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

    /**
     * Add Order entity to collection (one to many).
     *
     * @param \App\Models\Doctrine\Entities\Order $order
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function addOrder(Order $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove Order entity from collection (one to many).
     *
     * @param \App\Models\Doctrine\Entities\Order $order
     * @return \App\Models\Doctrine\Entities\SharedOrderPayment
     */
    public function removeOrder(Order $order)
    {
        $this->orders->removeElement($order);

        return $this;
    }

    /**
     * Get Order entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    public function __sleep()
    {
        return array('id', 'created_at', 'updated_at', 'deleted_at', 'pagamento', 'descricao');
    }
}