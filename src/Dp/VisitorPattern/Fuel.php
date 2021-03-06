<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 10:47 AM
 */

namespace Dp\VisitorPattern;


class Fuel
{
    /**
     * @var float
     */
    private $price;

    /**
     * Alcohol constructor.
     * @param float $price
     */
    public function __construct(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    public function accept(Visitor $visitor)
    {
        return $visitor->visitFuel($this);
    }
}