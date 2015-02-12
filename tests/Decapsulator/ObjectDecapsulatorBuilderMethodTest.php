<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Decapsulator;

use Decapsulator\AbstractObjectDecapsulatorTest;

/**
 * ObjectDecapsulatorBuilderMethodTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulatorBuilderMethodTest extends AbstractObjectDecapsulatorTest
{
    /**
     * Get tested class instance public or non-public property.
     *
     * @param unknown $decapsulator
     * @param string $propertyName
     * @return mixed
     */
    private function getDecapsulatorProperty($decapsulator, $propertyName)
    {
        $decapsulatorReflection = new \ReflectionClass('\Decapsulator\ObjectDecapsulator');

        $property = $decapsulatorReflection->getProperty($propertyName);
        $property->setAccessible(true);
        $propertyValue = $property->getValue($decapsulator);

        return $propertyValue;
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method returns ObjectDecapsulator instance.
     */
    public function testCreateInstanceFromObjectReturnsCorrectInstance()
    {
        $decapsulator = $this->callDecapsulatorMethodWithArguments('createInstanceFromObject', array($this->decapsulatedObject));

        $this->assertInstanceOf('\Decapsulator\ObjectDecapsulator', $decapsulator);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method sets object property correctly.
     */
    public function testCreateInstanceFromObjectSetsObjectCorrectly()
    {
        $decapsulator = $this->callDecapsulatorMethodWithArguments('createInstanceFromObject', array($this->decapsulatedObject));

        $decapsulatorObject = $this->getDecapsulatorProperty($decapsulator, 'object');

        $this->assertSame($this->decapsulatedObject, $decapsulatorObject);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method sets reflection property correctly.
     */
    public function testCreateInstanceFromObjectSetsReflectionCorrectly()
    {
        $decapsulator = $this->callDecapsulatorMethodWithArguments('createInstanceFromObject', array($this->decapsulatedObject));

        $decapsulatorReflection = $this->getDecapsulatorProperty($decapsulator, 'reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $decapsulatorReflection);
    }

    /**
     * Test objectIsValid($object) method returns false for argument of build-in type.
     */
    public function testObjectIsValidReturnsFalseForBuildinType()
    {
        $object = 4;

        $methodReturnedValue = $this->callDecapsulatorMethodWithArguments('objectIsValid', array($object));

        $this->assertFalse($methodReturnedValue);
    }

    /**
     * Test objectIsValid($object) method returns true for argument being a class instance.
     */
    public function testObjectIsValidReturnsTrueForObject()
    {
        $methodReturnedValue = $this->callDecapsulatorMethodWithArguments('objectIsValid', array($this->decapsulatedObject));

        $this->assertTrue($methodReturnedValue);
    }

    /**
     * Test buildForObject($object) method throws InvalidObjectException when $object is not valid.
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument is not an object.
     */
    public function testBuildForObjectThrowsExceptionForNotValidObject()
    {
        $object = 4;

        $methodReturnedValue = $this->callDecapsulatorMethodWithArguments('buildForObject', array($object));
    }

    /**
     * Test buildForObject($object) method returns ObjectDecapsulatorInstance when $object id valid.
     */
    public function testBuildForObjectReturnsCorrectInstanceForValidObject()
    {
        $objectDecapsulator = $this->callDecapsulatorMethodWithArguments('buildForObject', array($this->decapsulatedObject));

        $this->assertInstanceOf('Decapsulator\ObjectDecapsulator', $objectDecapsulator);
    }

    /**
     * Test buildForObject($object) method sets object property correctly when $object id valid.
     */
    public function testBuildForObjectSetsObjectCorrectlyForValidObject()
    {
        $decapsulator = $this->callDecapsulatorMethodWithArguments('buildForObject', array($this->decapsulatedObject));

        $decapsulatorObject = $this->getDecapsulatorProperty($decapsulator, 'object');

        $this->assertSame($this->decapsulatedObject, $decapsulatorObject);
    }

    /**
     * Test buildForObject($object) method sets reflection property correctly when $object id valid.
     */
    public function testBuildForObjectSetsReflectionCorrectlyForValidObject()
    {
        $decapsulator = $this->callDecapsulatorMethodWithArguments('buildForObject', array($this->decapsulatedObject));

        $decapsulatorReflection = $this->getDecapsulatorProperty($decapsulator, 'reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $decapsulatorReflection);
    }
}
