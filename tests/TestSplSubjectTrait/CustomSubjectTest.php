<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests\Tests\TestSplSubjectTrait;

use PHPUnit\Framework\TestCase;
use Snailweb\Helpers\Tests\Tests\TestSplSubjectTrait\Sample\CustomSubject;
use Snailweb\Helpers\Tests\TestSplSubjectTrait;

/**
 * @internal
 */
class CustomSubjectTest extends TestCase
{
    use TestSplSubjectTrait;

    public function setUp(): void
    {
        $this->setUpSplSubject(CustomSubject::class, 'myObservers');
    }
}
