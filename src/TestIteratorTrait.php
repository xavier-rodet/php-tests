<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests;

trait TestIteratorTrait
{
    use AccessProtectedTrait;
    private $iteratorObject;
    private $keyName;
    private $arrayName;

    public function setUpIterator(string $iteratorClass, string $keyName = 'key', string $arrayName = 'array')
    {
        $this->iteratorObject = new $iteratorClass(['a', 'b']);
        $this->keyName = $keyName;
        $this->arrayName = $arrayName;
    }

    public function testConstruct()
    {
        $key = $this->getAttribute($this->iteratorObject, $this->keyName);

        $this->assertSame(0, $key);
    }

    public function testIteratorNext()
    {
        $oldKey = $this->getAttribute($this->iteratorObject, $this->keyName);
        $this->iteratorObject->next();
        $newKey = $this->getAttribute($this->iteratorObject, $this->keyName);

        $this->assertSame(($oldKey + 1), $newKey);

        return $this->iteratorObject;
    }

    /**
     * @depends testIteratorNext
     * @param \Iterator $iteratorObject
     */
    public function testIteratorCurrent(\Iterator $iteratorObject)
    {
        $key = $this->getAttribute($iteratorObject, $this->keyName);
        $array = $this->getAttribute($iteratorObject, $this->arrayName);

        $this->assertSame($array[$key], $iteratorObject->current());
    }

    /**
     * @depends testIteratorNext
     * @param \Iterator $iteratorObject
     */
    public function testIteratorKey(\Iterator $iteratorObject)
    {
        $key = $this->getAttribute($iteratorObject, $this->keyName);

        $this->assertSame($key, $iteratorObject->key());
    }

    /**
     * @depends testIteratorNext
     * @param \Iterator $iteratorObject
     */
    public function testIteratorValidTrue(\Iterator $iteratorObject)
    {
        $this->assertTrue($iteratorObject->valid());
    }

    public function testIteratorValidFalse()
    {
        $arrayCount = count($this->getAttribute($this->iteratorObject, $this->arrayName));
        $this->setAttribute($this->iteratorObject, $this->keyName, ($arrayCount + 1));

        $this->assertFalse($this->iteratorObject->valid());
        return $this->iteratorObject;
    }

    /**
     * @depends testIteratorValidFalse
     * @param \Iterator $iteratorObject
     */
    public function testIteratorRewind(\Iterator $iteratorObject)
    {
        $iteratorObject->rewind();
        $key = $this->getAttribute($iteratorObject, $this->keyName);

        $this->assertSame(0, $key);
    }
}
