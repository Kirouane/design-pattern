<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 8/4/18
 * Time: 8:55 PM
 */

namespace Dp\ChainOfResponsibilityPattern;


class File
{

    public static function getExtension($content)
    {
        $json = json_decode($content);

        if ($json !== null && json_last_error() === JSON_ERROR_NONE) {
            return 'json';
        }

        $img = getimagesizefromstring($content);

        if (is_array($img) && isset($img['mime']) && $img['mime'] === 'image/png') {
            return 'png';
        }

        $xml = @simplexml_load_string($content);

        if (false !== $xml) {
            return 'xml';
        }

        throw new \RuntimeException('Extension not found.');
    }
}