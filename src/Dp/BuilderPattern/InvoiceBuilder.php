<?php
namespace Dp\BuilderPattern;


class InvoiceBuilder implements BuilderInterface
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
        $this
            ->file
            ->addLine(new Line([
                '*****************************************',
                '                 INVOICE n° %s',
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
            '| DATE        | REFERENCE        | AMOUNT       |',
            '|_____________|__________________|______________|',
        ]));

        return $this;
    }

    public function addTableRows(): BuilderInterface
    {
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));
        $this->file->addLine(new Line([
            '|             |                  |              |',
            '|_____________|__________________|______________|',
        ]));

        return $this;
    }

    public function addTableFooter(): BuilderInterface
    {
        $this->file->addLine(new Line([
            '| TOTAL       |                  |              |',
            '|_____________|__________________|______________|',
            '',
            '',
            ''
        ]));

        return $this;
    }

    public function setFooter(): BuilderInterface
    {
        $this->file->addLine(new Line([
            'Payment reference : ',
            'IBAN : 128716876285127439174327643764734',
            'BIC : 124',
        ]));

        return $this;
    }


    public function getFile(): File
    {
        return $this->file;
    }
}