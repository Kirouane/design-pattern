<?php
namespace Dp\BuilderPattern;


class Director
{
    public function build(BuilderInterface $builder)
    {
        return $builder
            ->createFile()
            ->setHeader()
            ->setAddress()
            ->addTableHeader()
            ->addTableRows()
            ->addTableFooter()
            ->setFooter()
            ->getFile();

    }
}