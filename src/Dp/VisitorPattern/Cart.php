<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/4/18
 * Time: 12:58 PM
 */

namespace Dp\VisitorPattern;


class Cart
{
    /**
     * @var array
     */
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function accept(Visitor $visitor)
    {
        return $visitor->visitCart($this);
    }
}