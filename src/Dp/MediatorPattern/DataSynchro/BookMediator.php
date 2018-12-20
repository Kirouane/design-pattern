<?php
/**
 * Created by PhpStorm.
 * User: nassim.kirouane
 * Date: 12/20/18
 * Time: 9:41 AM
 */

namespace Dp\MediatorPattern\DataSynchro;


class BookMediator
{
    /**
     * @var Colleague[]
     */
    private $colleagues = [];

    /**
     * Mediator constructor.
     * @param Colleague[] $colleagues
     */
    public function __construct(array $colleagues)
    {
        $this->colleagues = $colleagues;
        foreach ($colleagues as $colleague) {
            $colleague->setMediator($this);
        }
    }

    public function send($type, $data, $from)
    {
        if ($type !== 'book') {
            return;
        }

        foreach ($this->colleagues as $colleague) {
            if ($from instanceof $colleague) {
                continue;
            }

            $colleague->receive('book', $data, $from);
        }
    }
}