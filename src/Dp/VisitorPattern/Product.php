<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/3/18
 * Time: 11:58 AM
 */

namespace Dp\VisitorPattern;


interface Product
{
    public function accept(Visitor $visitor);
}