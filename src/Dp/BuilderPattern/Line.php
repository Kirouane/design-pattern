<?php
namespace Dp\BuilderPattern;


class Line
{
    private $content = [];

    /**
     * Line constructor.
     * @param array $content
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return implode("\n", $this->content);
    }

}