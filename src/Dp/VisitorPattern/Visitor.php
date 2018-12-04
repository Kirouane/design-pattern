<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 10:47 AM
 */

namespace Dp\VisitorPattern;


interface Visitor
{
    public function visitAlcohol(Alcohol $alcohol);
    public function visitFood(Food $food);
    public function visitFuel(Fuel $fuel);
    public function visitCart(Cart $fuel);
}