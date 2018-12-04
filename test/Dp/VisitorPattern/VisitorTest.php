<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 12:17 PM
 */

namespace Dp\VisitorPattern;


use PHPUnit\Framework\TestCase;

class TaxVisitorTest extends TestCase
{

    public function visitAlcoholProvider()
    {
        return [
            [0, 0.0],
            [9.99, 8.39]
        ];
    }

    /**
     * @test
     * @dataProvider visitAlcoholProvider
     */
    public function visitAlcohol($price, $expected)
    {
        $alcohol = new Alcohol($price);

        $visitor = new TaxVisitor();
        $alcohol = $alcohol->accept($visitor);

        $visitor = new DiscountVisitor();
        $alcohol = $alcohol->accept($visitor);

        self::assertSame($expected, $alcohol->getPrice());
    }

    public function visitFoodProvider()
    {
        return [
            [0, 0.0],
            [9.99, 6.99]
        ];
    }

    /**
     * @test
     * @dataProvider visitFoodProvider
     */
    public function visitFood($price, $expected)
    {
        $food = new Food($price);

        $visitor = new TaxVisitor();
        $food = $food->accept($visitor);

        $visitor = new DiscountVisitor();
        $food = $food->accept($visitor);

        self::assertSame($expected, $food->getPrice());
    }

    public function visitFuelProvider()
    {
        return [
            [0, 0.0],
            [9.99, 9.99]
        ];
    }


    /**
     * @test
     * @dataProvider visitFuelProvider
     */
    public function visitFuel($price, $expected)
    {
        $fuel = new Fuel($price);

        $visitor = new TaxVisitor();
        $fuel = $fuel->accept($visitor);

        $visitor = new DiscountVisitor();
        $fuel = $fuel->accept($visitor);

        self::assertSame($expected, $fuel->getPrice());
    }

    /**
     * @test
     */
    public function visitCart() {
        $cartItems = [new Food(12), new Alcohol(15), new Fuel(56) ];
        $cart = new Cart($cartItems);

        $visitor = new TaxVisitor();
        //
        $cart = $cart->accept($visitor);

        $visitor = new DiscountVisitor();
        $cart = $cart->accept($visitor);

        $expectedCart = new Cart([new Food(8.4), new Alcohol(12.6), new Fuel(56) ]);
        self::assertEquals($expectedCart, $cart);


    }
}