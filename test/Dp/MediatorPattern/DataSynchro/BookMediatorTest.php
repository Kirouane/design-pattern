<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/20/18
 * Time: 9:47 AM
 */
namespace Dp\MediatorPattern\DataSynchro;
class BookMediatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function databaseInsertTest()
    {
        $database = new Storage\Database();
        $archive = new Storage\Archive();
        $index = new Storage\Index();

        new BookMediator([
            $database,
            $archive,
            $index,
        ]);

        $database->insert(
            'book',
            [
                'title' => 'Best Design Patterns',
                'author' => 'Jane Doe',
            ]
        );

        self::assertSame(
            [
                'title' => 'Best Design Patterns',
                'author' => 'Jane Doe',

            ],
            $database->getPostgresData()['book'][0]
        );

        self::assertSame(
            [
                'title' => 'Best Design Patterns',
                'author' => 'Jane Doe',
                'source' => 'Dp\MediatorPattern\DataSynchro\Storage\Database',
                'archiving_date' => date('Y-m-d')

            ],
            $archive->getPostgresData()['book'][0]
        );

        self::assertSame(
            '{"title":"Best Design Patterns","author":"Jane Doe","source":"Dp\\\MediatorPattern\\\DataSynchro\\\Storage\\\Database"}',
            $index->getElasticSearchData()['book'][0]
        );
    }
}