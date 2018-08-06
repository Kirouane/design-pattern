<?php
namespace Dp\StatePattern;

use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    /**
     * @test
     *
     * Created => activated => customer => terminated => archived
     */
    public function fullCustomerScenario()
    {
        $user = new User();

        self::assertSame('created', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('activation'));


        self::assertSame('activated', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('subscription', ['amount' => 15]));

        self::assertSame('customer', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('subscription-expired'));

        self::assertSame('terminated', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('deletion'));

        self::assertSame('archived', (string)$user->getState());
    }

    /**
     * @test
     *
     * Created => activated => guest => terminated => archived
     */
    public function fullGuestScenario()
    {
        $user = new User();

        self::assertSame('created', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('activation'));


        self::assertSame('activated', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('subscription', ['amount' => 0]));

        self::assertSame('guest', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('subscription-expired'));

        self::assertSame('terminated', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('deletion'));

        self::assertSame('archived', (string)$user->getState());
    }

    /**
     * @test
     */
    public function createdDeletionScenario()
    {
        $user = new User();

        self::assertSame('created', (string)$user->getState());

        $user
            ->getState()
            ->proceedNext(new Event('deletion'));


        self::assertSame('created', (string)$user->getState());

    }

    public function providerOtherScenario()
    {
        return [
            [0, 0],
            [10, 0]
        ];
    }

    /**
     * @test
     * @dataProvider providerOtherScenario
     *    ??????????????
     */
    public function otherScenario($firstAmount, $secondAmount)
    {
        $user = new User();

        $user
            ->getState()
            ->proceedNext(new Event('activation'));

        $user
            ->getState()
            ->proceedNext(new Event('subscription', ['amount' => $firstAmount]));

        $user
            ->getState()
            ->proceedNext(new Event('subscription-expired'));

        $user
            ->getState()
            ->proceedNext(new Event('subscription', ['amount' => $secondAmount]));

        self::assertSame('guest', (string)$user->getState());
    }

    /**
     * @test
     *
     */
    public function premiumScenario() {
        $user = new User();

        $user
            ->getState()
            ->proceedNext(new Event('activation'));

        $user
            ->getState()
            ->proceedNext(new Event('subscription', ['amount' => 20]));

        self::assertSame('premium', (string)$user->getState());
    }
}