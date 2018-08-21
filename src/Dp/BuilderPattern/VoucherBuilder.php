<?php
namespace Dp\BuilderPattern;


class VoucherBuilder implements BuilderInterface
{
    /**
     * @var File
     */
    private $file;


    /**
     * @return BuilderInterface
     */
    public function createFile(): BuilderInterface
    {
        $this->file = new File();

        return $this;
    }

    public function setHeader(): BuilderInterface
    {
        $this->file
            ->addLine(new Line([
                '*****************************************',
                '                 VOUCHER N° %s',
                '*****************************************',
            ]))
            ->addLine(new Line(['']));

        return $this;
    }

    public function setAddress(): BuilderInterface
    {
        $this
            ->file
            ->addLine(new Line([
                'Address: %s'
            ]))
            ->addLine(new Line(['']));

        return $this;
    }

    public function addTableHeader(): BuilderInterface
    {
        $this->file->addLine(new Line([
            '________________________________________________',
            '| NAME                           | AMOUNT       |',
            '|________________________________|______________|',
        ]));

        return $this;
    }

    public function addTableRows(): BuilderInterface
    {
        $this->file->addLine(new Line([
            '|                                |              |',
            '|________________________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|                                |              |',
            '|________________________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|                                |              |',
            '|________________________________|______________|',
        ]));

        return $this;
    }

    public function addTableFooter(): BuilderInterface
    {
        $this->file->addLine(new Line([
            '',
            '',
            ''
        ]));

        return $this;
    }

    public function setFooter(): BuilderInterface
    {
        $this->file->addLine(new Line([
            'Expiration date ' . date('Y-m-d'),
        ]));

        return $this;
    }


    public function getFile(): File
    {
        return $this->file;
    }
}