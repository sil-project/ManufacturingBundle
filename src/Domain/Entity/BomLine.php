<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Sil\Bundle\ManufacturingBundle\Domain\Entity;

use Blast\BaseEntitiesBundle\Entity\Traits\Guidable;
use Sil\Bundle\StockBundle\Domain\Entity\StockItemInterface;
use Sil\Bundle\StockBundle\Domain\Entity\Uom;
use Sil\Bundle\StockBundle\Domain\Entity\UomQty;

/**
 * @author Glenn Cavarlé <glenn.cavarle@libre-informatique.fr>
 */
class BomLine
{

    use Guidable;

    /**
     *
     * @var Bom 
     */
    private $bom;

    /**
     *
     * @var StockItemInterface 
     */
    private $stockItem;

    /**
     *
     * @var float 
     */
    private $qtyValue = 0;

    /**
     *
     * @var Uom 
     */
    private $qtyUom;

    /**
     * 
     * @return Bom
     */
    public function getBom(): ?Bom
    {
        return $this->bom;
    }

    /**
     * 
     * @param Bom $bom
     */
    public function setBom(Bom $bom)
    {
        $this->bom = $bom;
    }

    /**
     * 
     * @return StockItemInterface
     */
    public function getStockItem(): ?StockItemInterface
    {
        return $this->stockItem;
    }

    /**
     * 
     * @param StockItemInterface $stockItem
     */
    public function setStockItem(StockItemInterface $stockItem)
    {
        $this->stockItem = $stockItem;
    }

    /**
     * 
     * @return UomQty
     */
    public function getQty(): ?UomQty
    {
        if ( null == $this->qtyUom ) {
            return null;
        }
        return new UomQty($this->qtyUom, floatval($this->qtyValue));
    }

    /**
     * 
     * @param UomQty $qty
     * @return void
     */
    public function setQty(UomQty $qty): void
    {
        $this->qtyValue = $qty->getValue();
        $this->qtyUom = $qty->getUom();
    }
}
