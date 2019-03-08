<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests;

trait TestSubjectTrait
{
    use AccessProtectedTrait;

    private $subjectClass;
    private $observersName;

    public function setUpSplSubject(string $subjectClass, string $observersName = 'observers')
    {
        $this->subjectClass = new $subjectClass();
        $this->observersName = $observersName;
    }

    public function testAttach()
    {
        $observer = $this->createMock(\SplObserver::class);
        $this->subjectClass->attach($observer);

        $observers = $this->getAttribute($this->subjectClass, $this->observersName);
        $this->assertTrue(in_array($observer, $observers, true));

        return [$this->subjectClass, $observer];
    }

    /**
     * @depends testAttach
     *
     * @param array $parameters
     */
    public function testDetachClone(array $parameters)
    {
        $splSubject = $parameters[0];
        $observer = $parameters[1];
        $observerClone = clone $observer;

        $splSubject->detach($observerClone);
        $observers = $this->getAttribute($splSubject, $this->observersName);
        $this->assertTrue(in_array($observer, $observers, true));
    }

    /**
     * @depends testAttach
     *
     * @param array $parameters
     */
    public function testDetach(array $parameters)
    {
        $splSubject = $parameters[0];
        $observer = $parameters[1];

        $splSubject->detach($observer);
        $observers = $this->getAttribute($splSubject, $this->observersName);
        $this->assertFalse(in_array($observer, $observers, true));
    }

    /**
     * @depends testAttach
     *
     * @param array $parameters
     */
    public function testNotify(array $parameters)
    {
        // We can use parameters from testAttach because we need to add expectations on observer
        $observer = $this->createMock(\SplObserver::class);
        $observer->expects($this->exactly(1))
            ->method('update')
            ->with($this->subjectClass)
        ;

        $this->subjectClass->attach($observer);
        $this->subjectClass->notify();
    }
}
