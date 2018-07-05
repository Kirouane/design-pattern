<?php
namespace Dp\StatePattern\State;


use Dp\StatePattern\Event;
use Dp\StatePattern\User;

class Activated implements StateInterface
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
        return 'activated';
    }

    public function proceedNext(Event $event)
    {
        if ($event->getName() === 'subscription') {
            if (0 === $event->getParams()['amount']) {
                $this->user->setState(new Guest($this->user));
            } elseif (20 <= $event->getParams()['amount']) {
                $this->user->setState(new Premium($this->user));
            }
            else {
                $this->user->setState(new Customer($this->user));
            }
        }

        if ($event->getName() === 'deletion') {
            $this->user->setState(new Archived($this->user));
        }
    }
}