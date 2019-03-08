# php-tests-helpers
Helpers for PHP tests

## Usage

### AccessProtectedTrait
Helper to invoke methods and to get/set attributes values with private/protected visibility

```
<?php

class MyClassTest
{
    use Snailweb\Helpers\Tests\AccessProtectedTrait;

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
* The tested class constructor must accept no parameters
* The test class must call setUpInterator() with class name, and optionally key name and array name (example shows defaults)

```
<?php

class MyClassTest extends TestCase
{
    use Snailweb\Helpers\Tests\TestIteratorTrait;
    
    public function setUp(): void
    {
        $this->setUpIterator(MyClass::class, 'key', 'array');
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
    use Snailweb\Helpers\Tests\TestIteratorTrait{
        testConstruct as testIteratorConstruct;
    }
    
    public function setUp(): void
    {
        $this->setUpIterator(MyClass::class, 'key', 'array');
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


### TestSplSubjectTrait
Helper to automatically apply SplSubject tests for a class.

Requirements :
* The tested class must implement SplSubject (that's the point of doing this ...)
* The tested class constructor must accept no parameters
* The test class must call setUpSplSubject() with class name, and optionally observers name (example shows defaults)

```
<?php

class MyClassTest extends TestCase
{
    use Snailweb\Helpers\Tests\TestSplSubjectTrait;
    
    public function setUp(): void
    {
        $this->setUpSplSubject(MyClass::class, 'observers');
    }

    // Do your methods tests
    // ...
}
```

