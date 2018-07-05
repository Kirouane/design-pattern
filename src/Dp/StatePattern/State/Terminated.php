<?php
namespace Dp\StatePattern\State;


use Dp\StatePattern\Event;
use Dp\StatePattern\User;


class Terminated implements StateInterface
{

    /**
     * @var User
     */
    private $user;

    /**
     * Created constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __toString()
    {
        return 'terminated';
    }

    public function proceedNext(Event $event)
    {
        if ($event->getName() === 'deletion') {
            $this->user->setState(new Archived($this->user));
        }

        if ($event->getName() === 'subscription') {
            if (0 === $event->getParams()['amount']) {
                $this->user->setState(new Guest($this->user));
                return;
            }
            $this->user->setState(new Customer($this->user));
        }
    }
}