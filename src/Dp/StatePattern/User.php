<?php
namespace Dp\StatePattern;

use Dp\StatePattern\State\Created;
use Dp\StatePattern\State\StateInterface;

class User
{
    /**
     * @var StateInterface
     */
    private $state;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->state = new Created($this);
    }


    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    /**
     * @return StateInterface
     */
    public function getState()
    {
        return $this->state;
    }

    public function activation()
    {
        return $this->state->activation();
    }
}