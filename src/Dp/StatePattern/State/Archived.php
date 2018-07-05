<?php
namespace Dp\StatePattern\State;


use Dp\StatePattern\Event;
use Dp\StatePattern\User;


class Archived implements StateInterface
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
        return 'archived';
    }

    public function proceedNext(Event $event)
    {
    }
}