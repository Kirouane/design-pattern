<?php
namespace Dp\ChainOfResponsibilityPattern;

use Dp\ChainOfResponsibilityPattern\Extension\Json;
use Dp\ChainOfResponsibilityPattern\Extension\Png;
use Dp\ChainOfResponsibilityPattern\Extension\Jpg;
use Dp\ChainOfResponsibilityPattern\Extension\Xml;
use PHPUnit\Framework\TestCase;

class ExtensionTest extends TestCase
{


    public function getExtensionProvider()
    {
        return [
            ['[]', 'json'],
            ['{}', 'json'],
            ['{"field":"value"}', 'json'],

            ['<field></field>', 'xml'],
            ['<field attrib="attrib">balise</field>', 'xml'],

            [file_get_contents(__DIR__ . '/png-image.png'), 'png'],
            [file_get_contents(__DIR__ . '/cover-faq.jpg'), 'jpg'],
            ['hello JC!', null],
            [file_get_contents(__DIR__ . '/test.gif'), null],
        ];
    }

    /**
     * @test
     * @dataProvider getExtensionProvider
     */
    public function getExtension($fileContent, $expectedExtension)
    {
        $handler = new Json();
        $handler
            ->setNextHandler(new Png())
            ->setNextHandler(new Jpg())
            ->setNextHandler(new Xml());

        self::assertSame($expectedExtension, $handler->getExtension($fileContent));
    }
}