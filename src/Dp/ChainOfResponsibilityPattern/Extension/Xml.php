<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 8/4/18
 * Time: 9:09 PM
 */

namespace Dp\ChainOfResponsibilityPattern\Extension;


class Xml extends AbstractExtensionHandler
{


    public function findExtension($fileContent)
    {
        $xml = @simplexml_load_string($fileContent);

        if (false === $xml) {
            return null;
        }

        return 'xml';
    }
}