# php-tests-helpers
Helpers for PHP tests

## Usage

### AccessProtectedTrait
Helper to invoke methods and to get/set attributes values with private/protected visibility

```
<?php

class MyClassTest
{
    use Snailweb\Tests\AccessProtectedTrait;

    public function testMyMethod()
    {
        // Invoke method
        $returnValue = $this->invokeMethod($object, 'methodName', ['arg1', 'arg2']);

        // Get attribute
        $attributeValue = $this->getAttribute($object, 'attributeName');

        // Set attribute
        $this->setAttribute($object, 'attributeName', $attributeValue);
    }
}
```


### TestIteratorTrait
Helper to automatically apply Iterator tests for a class.

Requirements :
* The tested class must implement Iterator (that's the point of doing this ...)
* The tested class must use an iteration key named 'key'

```
<?php

class MyClassTest extends TestCase
{
    use Snailweb\Tests\TestIteratorTrait;
    
    public function setUp(): void
    {
        $this->iterator = new MyClass();
    }

    // Do your methods tests
    // ...
}
```

Note: if you need to test the constructor of your class you must do this :
```
<?php

class MyClassTest extends TestCase
{
    use Snailweb\Tests\TestIteratorTrait{
        testConstruct as testIteratorConstruct;
    }
    
    public function setUp(): void
    {
        $this->iterator = new MyClass();
    }

    public function testConstruct()
    {
        $this->testIteratorConstruct();

        // Do your constructor tests
        // ...
    }

    // Do your methods tests
    // ...
}
```

