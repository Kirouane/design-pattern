<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 8/4/18
 * Time: 9:09 PM
 */

namespace Dp\ChainOfResponsibilityPattern\Extension;


class Json extends AbstractExtensionHandler
{


    public function findExtension($fileContent)
    {
        $json = json_decode($fileContent);
        if ($json === null) {
            return null;
        }

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return 'json';
    }
}