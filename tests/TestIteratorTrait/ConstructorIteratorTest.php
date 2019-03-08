<?php

namespace Snailweb\Helpers\Tests\Tests\TestIteratorTrait;

use Snailweb\Helpers\Tests\TestIteratorTrait;
use Snailweb\Helpers\Tests\Tests\TestIteratorTrait\Sample\ConstructorIterator;
use PHPUnit\Framework\TestCase;

class ConstructorIteratorTest extends TestCase
{
    use TestIteratorTrait {
        testConstruct as testIteratorConstruct;
    }

    public function setUp(): void
    {
        $this->setUpIterator(ConstructorIterator::class);
    }


    public function testConstruct()
    {
        $this->testIteratorConstruct();

        $myObject = new ConstructorIterator();

        $initValue = $this->getAttribute($myObject, 'initValue');
        $this->assertTrue($initValue);
    }
}
