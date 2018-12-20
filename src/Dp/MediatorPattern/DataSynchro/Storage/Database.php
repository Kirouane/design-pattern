<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/20/18
 * Time: 9:43 AM
 */

namespace Dp\MediatorPattern\DataSynchro\Storage;


use Dp\MediatorPattern\DataSynchro\Colleague;

class Database extends Colleague
{

    private $postgresData = [
        'book' => []
    ];


    public function receive(string $type, array $data, Colleague $from)
    {
        $data['source'] = get_class($from);
        $this->addData($type, $data);
    }

    public function insert($type, $data)
    {
        $this->addData($type, $data);
        $this->mediator->send($type, $data, $this);
    }

    private function addData($type, $data)
    {
        $this->postgresData[$type][] = $data;
    }


    public function getPostgresData()
    {
        return $this->postgresData;
    }

}