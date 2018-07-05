<?php
namespace Dp\StatePattern\State;


use Dp\StatePattern\Event;
use Dp\StatePattern\User;


class Created implements StateInterface
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
        return 'created';
    }

    public function proceedNext(Event $event)
    {
        if ($event->getName() === 'activation') {
            $this->user->setState(new Activated($this->user));
        }
    }
}