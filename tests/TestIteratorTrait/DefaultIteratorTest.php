<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests\Tests\TestIteratorTrait;

use PHPUnit\Framework\TestCase;
use Snailweb\Helpers\Tests\TestIteratorTrait;
use Snailweb\Helpers\Tests\Tests\TestIteratorTrait\Sample\DefaultIterator;

/**
 * @internal
 */
class DefaultIteratorTest extends TestCase
{
    use TestIteratorTrait;

    public function setUp(): void
    {
        $this->setUpIterator(DefaultIterator::class);
    }
}
