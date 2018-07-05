<?php
namespace Dp\StatePattern\State;

use Dp\StatePattern\Event;

interface StateInterface
{
    /**
     * @param Event $event
     * @return StateInterface
     */
    public function proceedNext(Event $event);
    public function __toString();
}