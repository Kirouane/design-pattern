<?php
namespace Dp\BuilderPattern;

use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    /**
     * @test
     */
    public function buildInvoice()
    {
        $director = new Director();
        $file = $director->build(new InvoiceBuilder());

        self::assertSame($this->getExpectedInvoiceContent(), $file->render([1234, '10 rue du faubourg poissonnière']));
    }


    /**
     * @test
     */
    public function buildVoucher()
    {
        $director = new Director();
        $file = $director->build(new VoucherBuilder());

        self::assertSame($this->getExpectedVoucherContent(), $file->render([5678, '-----']));
    }



    public function getExpectedInvoiceContent()
    {
        return '*****************************************
                 INVOICE n° 1234
*****************************************

Address: 10 rue du faubourg poissonnière

________________________________________________
| DATE        | REFERENCE        | AMOUNT       |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
|             |                  |              |
|_____________|__________________|______________|
| TOTAL       |                  |              |
|_____________|__________________|______________|



Payment reference : 
IBAN : 128716876285127439174327643764734
BIC : 124
';
    }

    public function getExpectedVoucherContent()
    {
        return '*****************************************
                 VOUCHER N° 5678
*****************************************

Address: -----

________________________________________________
| NAME                           | AMOUNT       |
|________________________________|______________|
|                                |              |
|________________________________|______________|
|                                |              |
|________________________________|______________|
|                                |              |
|________________________________|______________|



Expiration date 2018-08-21
';
    }
}