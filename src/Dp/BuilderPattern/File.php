<?php
namespace Dp\BuilderPattern;


class File
{

    private $lines = [];

    /**
     * @param Line $line
     * @return $this
     */
    public function addLine(Line $line)
    {
        $this->lines[] = $line;
        return $this;
    }

    public function render(array $params)
    {
        $str = '';

        foreach ($this->lines as $line) {
            $str .= $line->render() . "\n";
        }

        return vsprintf($str, $params);
    }
}