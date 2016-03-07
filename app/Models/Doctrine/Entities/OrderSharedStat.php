<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-02-25 22:56:30.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace App\Models\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\Models\Doctrine\Entities\OrderSharedStat
 *
 * @ORM\Entity(repositoryClass="OrderSharedStatRepository")
 * @ORM\Table(name="order_shared_stat", indexes={@ORM\Index(name="order_shared_stat_order_id_index", columns={"order_id"}), @ORM\Index(name="order_shared_stat_shared_stat_id_index", columns={"shared_stat_id"})})
 */
class OrderSharedStat
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
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $order_id;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $shared_stat_id;

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderSharedStats")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
     */
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="SharedStat", inversedBy="orderSharedStats")
     * @ORM\JoinColumn(name="shared_stat_id", referencedColumnName="id", nullable=false)
     */
    protected $sharedStat;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
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
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
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
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
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
     * Set the value of order_id.
     *
     * @param integer $order_id
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of order_id.
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set the value of shared_stat_id.
     *
     * @param integer $shared_stat_id
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
     */
    public function setSharedStatId($shared_stat_id)
    {
        $this->shared_stat_id = $shared_stat_id;

        return $this;
    }

    /**
     * Get the value of shared_stat_id.
     *
     * @return integer
     */
    public function getSharedStatId()
    {
        return $this->shared_stat_id;
    }

    /**
     * Set Order entity (many to one).
     *
     * @param \App\Models\Doctrine\Entities\Order $order
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
     */
    public function setOrder(Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get Order entity (many to one).
     *
     * @return \App\Models\Doctrine\Entities\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set SharedStat entity (many to one).
     *
     * @param \App\Models\Doctrine\Entities\SharedStat $sharedStat
     * @return \App\Models\Doctrine\Entities\OrderSharedStat
     */
    public function setSharedStat(SharedStat $sharedStat = null)
    {
        $this->sharedStat = $sharedStat;

        return $this;
    }

    /**
     * Get SharedStat entity (many to one).
     *
     * @return \App\Models\Doctrine\Entities\SharedStat
     */
    public function getSharedStat()
    {
        return $this->sharedStat;
    }

    public function __sleep()
    {
        return array('id', 'created_at', 'updated_at', 'order_id', 'shared_stat_id');
    }
}