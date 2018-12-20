<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/20/18
 * Time: 9:41 AM
 */

namespace Dp\MediatorPattern\DataSynchro;


abstract class Colleague
{
    /**
     * @var BookMediator
     */
    protected $mediator;

    /**
     * @param BookMediator $mediator
     * @return Colleague
     */
    public function setMediator(BookMediator $mediator): Colleague
    {
        $this->mediator = $mediator;
        return $this;
    }


    abstract public function receive(string $type, array $data, Colleague $from);
}