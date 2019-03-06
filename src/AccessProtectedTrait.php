<?php

declare(strict_types=1);

namespace Snailweb\Helpers\Tests;

trait AccessProtectedTrait
{
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    public function getAttribute(&$object, $attributeName)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $attribute = $reflection->getProperty($attributeName);
        $attribute->setAccessible(true);

        return $attribute->getValue($object);
    }

    public function setAttribute(&$object, $attributeName, $attributeValue)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $attribute = $reflection->getProperty($attributeName);
        $attribute->setAccessible(true);

        $attribute->setValue($object, $attributeValue);
    }
}
