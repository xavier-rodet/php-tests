<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests\Tests\TestSubjectTrait\Sample;

class CustomSubject implements \SplSubject
{
    private $myObservers = [];

    /**
     * Attach an SplObserver.
     *
     * @see https://php.net/manual/en/splsubject.attach.php
     *
     * @param SplObserver $observer <p>
     *                              The <b>SplObserver</b> to attach.
     *                              </p>
     *
     * @since 5.1.0
     */
    public function attach(\SplObserver $observer): void
    {
        $this->myObservers[] = $observer;
    }

    /**
     * Detach an observer.
     *
     * @see https://php.net/manual/en/splsubject.detach.php
     *
     * @param SplObserver $observer <p>
     *                              The <b>SplObserver</b> to detach.
     *                              </p>
     *
     * @since 5.1.0
     */
    public function detach(\SplObserver $observer): void
    {
        if (is_int($key = array_search($observer, $this->myObservers, true))) {
            unset($this->myObservers[$key]);
        }
    }

    /**
     * Notify an observer.
     *
     * @see https://php.net/manual/en/splsubject.notify.php
     * @since 5.1.0
     */
    public function notify(): void
    {
        foreach ($this->myObservers as $observer) {
            $observer->update($this);
        }
    }
}
