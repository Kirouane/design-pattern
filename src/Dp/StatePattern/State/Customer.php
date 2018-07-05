<?php
namespace Dp\StatePattern\State;


use Dp\StatePattern\Event;
use Dp\StatePattern\State\Activated;
use Dp\StatePattern\User;


class Customer implements StateInterface
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
        return 'customer';
    }

    public function proceedNext(Event $event)
    {
        if ('subscription-expired' === $event->getName()) {
            $this->user->setState(new Terminated($this->user));
        }

        if ($event->getName() === 'deletion') {
            $this->user->setState(new Archived($this->user));
        }
    }
}