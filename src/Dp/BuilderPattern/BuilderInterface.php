<?php
namespace Dp\BuilderPattern;


interface BuilderInterface
{
    public function createFile(): BuilderInterface;

    public function setHeader(): BuilderInterface;
    public function setAddress(): BuilderInterface;
    public function addTableHeader(): BuilderInterface;
    public function addTableRows(): BuilderInterface;
    public function addTableFooter(): BuilderInterface;
    public function setFooter(): BuilderInterface;

    public function getFile(): File;

}