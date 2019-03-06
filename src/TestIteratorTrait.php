<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests;

trait TestIteratorTrait
{
    use AccessProtectedTrait;
    private $iterator;

    public function testConstruct()
    {
        $key = $this->getAttribute($this->iterator, 'key');

        $this->assertSame(0, $key);
    }

    public function testIteratorCurrent()
    {
        $key = $this->getAttribute($this->iterator, 'key');
        $signals = $this->getAttribute($this->iterator, 'signals');

        $this->assertSame($signals[$key], $this->iterator->current());
    }

    public function testIteratorNext()
    {
        $oldKey = $this->getAttribute($this->iterator, 'key');
        $this->iterator->next();
        $newKey = $this->getAttribute($this->iterator, 'key');

        $this->assertSame(($oldKey + 1), $newKey);
    }

    public function testIteratorKey()
    {
        $key = $this->getAttribute($this->iterator, 'key');

        $this->assertSame($key, $this->iterator->key());
    }

    public function testIteratorRewind()
    {
        $this->iterator->rewind();
        $key = $this->getAttribute($this->iterator, 'key');

        $this->assertSame(0, $key);
    }

    public function testIteratorValidTrue()
    {
        $this->assertTrue($this->iterator->valid());
    }
}
