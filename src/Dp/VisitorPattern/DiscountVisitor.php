<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 10:53 AM
 */

namespace Dp\VisitorPattern;


class DiscountVisitor implements Visitor
{

    /**
     * Réduction de 30%
     *
     * @param Alcohol $alcohol
     * @return Alcohol
     */
    public function visitAlcohol(Alcohol $alcohol)
    {
        return new Alcohol(round($alcohol->getPrice() * 0.7, 2));
    }

    /**
     * 3 acheté 1 offert
     *
     * @param Food $food
     * @return Food
     */
    public function visitFood(Food $food)
    {
        return new Food(round($food->getPrice() * 2 / 3, 2));
    }

    /**
     * Tva offerte
     *
     * @param Fuel $fuel
     * @return Fuel
     */
    public function visitFuel(Fuel $fuel)
    {
        return new Fuel(round(($fuel->getPrice() - .2) / 1.8, 2));
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