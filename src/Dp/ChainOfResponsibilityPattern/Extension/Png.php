<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 8/4/18
 * Time: 9:09 PM
 */

namespace Dp\ChainOfResponsibilityPattern\Extension;



class Png extends AbstractExtensionHandler
{


    public function findExtension($fileContent)
    {
        $img = @getimagesizefromstring($fileContent);

        if (!is_array($img) || !isset($img['mime'])) {
            return null;
        }

        if ($img['mime'] === 'image/png') {
            return 'png';
        }

        return null;
    }
}