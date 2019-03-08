<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests\Tests\TestSubjectTrait;

use PHPUnit\Framework\TestCase;
use Snailweb\Helpers\Tests\Tests\TestSubjectTrait\Sample\DefaultSubject;
use Snailweb\Helpers\Tests\TestSubjectTrait;

/**
 * @internal
 */
class DefaultSubjectTest extends TestCase
{
    use TestSubjectTrait;

    public function setUp(): void
    {
        $this->setUpSplSubject(DefaultSubject::class);
    }
}
