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

/**
 * ObjectDecapsulatorTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulatorBuilderMethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Name of the decapsulated object class.
     *
     * @var string
     */
    const DECAPSULATED_OBJECT_CLASS_NAME = '\Decapsulator\DemoClass';

    /**
     * Decapsulated object.
     * Instance of the fixture class.
     *
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS_NAME
     */
    private $decapsulatedObject;

    /**
     * Reflection for the fixture class.
     *
     * @var \ReflectionClass
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS_NAME
     */
    private $decapsulatedObjectClassReflection;

    /**
     * Instance of tested class.
     *
     * @var ObjectDecapsulator
     */
    private $decapsulator;

    /**
     * Reflection for the testes class.
     *
     * @var \ReflectionClass
     */
    private $decapsulatorReflection;

    /**
     * Set up the fixtures and helpers.
     * Called before a test is executed.
     */
    public function setUp()
    {
        $this->setUpDeapsulatedObjectClassReflection();
        $this->setUpDecapsulatedObject();
        $this->setUpDecapsulatorReflection();
        $this->setUpDecapsulator();
    }

    /**
     * Set up reflection for the fixture class.
     */
    private function setUpDeapsulatedObjectClassReflection()
    {
        $className = self::DECAPSULATED_OBJECT_CLASS_NAME;
        $this->decapsulatedObjectClassReflection = new \ReflectionClass($className);
    }

    /**
     * Set up decapsulated object fixture.
     */
    private function setUpDecapsulatedObject()
    {
        $className = self::DECAPSULATED_OBJECT_CLASS_NAME;
        $this->decapsulatedObject = new $className();
    }

    /**
     * Set up reflection for the tested class.
     */
    private function setUpDecapsulatorReflection()
    {
        $this->decapsulatorReflection = new \ReflectionClass('\Decapsulator\ObjectDecapsulator');
    }

    /**
     * Set up instance of tested class.
     */
    private function setUpDecapsulator()
    {
        $this->decapsulator = $this->decapsulatorReflection->newInstance();
    }

    /**
     * Set tested class instance public or non-public property.
     *
     * @param string $propertyName
     * @return mixed
     */
    private function setDecapsulatorProperty($propertyName, $propertyValue)
    {
        $property = $this->decapsulatorReflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($this->decapsulator, $propertyValue);
    }

    /**
     * Get tested class instance public or non-public property.
     *
     * @param string $propertyName
     * @return mixed
     */
    private function getDecapsulatorProperty($propertyName)
    {
        $property = $this->decapsulatorReflection->getProperty($propertyName);
        $property->setAccessible(true);
        $propertyValue = $property->getValue($this->decapsulator);

        return $propertyValue;
    }

    /**
     * Call tested class instance public or non-public method with no arguments.
     *
     * @param string $methodName
     * @return mixed
     */
    private function callDecapsulatorMethodWithNoArguments($methodName)
    {
        $method = $this->decapsulatorReflection->getMethod($methodName);
        $method->setAccessible(true);
        $methodReturnedValue = $method->invoke($this->decapsulator);

        return $methodReturnedValue;
    }

    /**
     * Call tested class instance public or non-public method with arguments.
     *
     * @param string $methodName
     * @param mixed[] $arguments
     * @return mixed
     */
    private function callDecapsulatorMethodWithArguments($methodName, $arguments)
    {
        $method = $this->decapsulatorReflection->getMethod($methodName);
        $method->setAccessible(true);
        $methodReturnedValue = $method->invokeArgs($this->decapsulator, $arguments);

        return $methodReturnedValue;
    }

    /**
     * Test setUpWithObject($object) method sets object property correctly.
     */
    public function testSetUpWithObjectSetsObjectCorrectly()
    {
        $this->callDecapsulatorMethodWithArguments('setUpWithObject', array($this->decapsulatedObject));

        $decapsulatorObject = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $decapsulatorObject);
    }

    /**
     * Test setUpWithObject($object) method sets reflection property correctly.
     */
    public function testSetUpWithObjectSetsReflectionCorrectly()
    {
        $this->callDecapsulatorMethodWithArguments('setUpWithObject', array($this->decapsulatedObject));

        $decapsulatorReflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectClassReflection, $decapsulatorReflection);
    }

    /**
     * Test setObject($object) method sets object property correctly.
     */
    public function testSetObjectSetsObjectCorrectly()
    {
        $this->callDecapsulatorMethodWithArguments('setObject', array($this->decapsulatedObject));

        $decapsulatorObject = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $decapsulatorObject);
    }

    /**
     * Test setUpReflection() method sets reflection property correctly.
     */
    public function testSetUpReflectionSetsReflectionCorrectly()
    {
        $this->setDecapsulatorProperty('object', $this->decapsulatedObject);
        $this->callDecapsulatorMethodWithNoArguments('setUpReflection');

        $decapsulatorReflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectClassReflection, $decapsulatorReflection);
    }
}
