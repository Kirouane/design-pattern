<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 10:53 AM
 */

namespace Dp\VisitorPattern;


class TaxVisitor implements Visitor
{

    /**
     * 20% de TAV
     *
     * @param Alcohol $alcohol
     * @return Alcohol
     */
    public function visitAlcohol(Alcohol $alcohol)
    {
        return new Alcohol(round($alcohol->getPrice() * 1.2, 2));
    }

    /**
     * 5% de TVA
     *
     * @param Food $food
     * @return Food
     */
    public function visitFood(Food $food)
    {
        return new Food(round($food->getPrice() * 1.05, 2));
    }

    /**
     * 80% + 20c de TVA
     *
     * @param Fuel $fuel
     * @return Fuel
     */
    public function visitFuel(Fuel $fuel)
    {
        return new Fuel(round($fuel->getPrice() * 1.8 + .2, 2));
    }

    public function visitCart(Cart $cart)
    {
        $products = $cart->getProducts();
        $result = [];

        foreach ($products as $product) {
            $result[] = $product->accept($this);
        }

        return new Cart($result);
    }
}