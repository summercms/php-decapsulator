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
 * AbstractObjectDecapsulatorBuilderMethodsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractObjectDecapsulatorBuilderMethodsTest extends \PHPUnit_Framework_TestCase
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
    protected $decapsulatedObject;

    /**
     * Reflection for the fixture class.
     *
     * @var \ReflectionClass
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS_NAME
     */
    protected $decapsulatedObjectClassReflection;

    /**
     * Instance of tested class.
     *
     * @var ObjectDecapsulator
     */
    protected $decapsulator;

    /**
     * Reflection for the testes class.
     *
     * @var \ReflectionClass
     */
    protected $decapsulatorReflection;

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
    protected function setUpDeapsulatedObjectClassReflection()
    {
        $className = self::DECAPSULATED_OBJECT_CLASS_NAME;
        $this->decapsulatedObjectClassReflection = new \ReflectionClass($className);
    }

    /**
     * Set up decapsulated object fixture.
     */
    protected function setUpDecapsulatedObject()
    {
        $className = self::DECAPSULATED_OBJECT_CLASS_NAME;
        $this->decapsulatedObject = new $className();
    }

    /**
     * Set up reflection for the tested class.
     */
    protected function setUpDecapsulatorReflection()
    {
        $this->decapsulatorReflection = new \ReflectionClass('\Decapsulator\ObjectDecapsulator');
    }

    /**
     * Set up instance of tested class.
     */
    protected function setUpDecapsulator()
    {
        $this->decapsulator = $this->decapsulatorReflection->newInstance();
    }

    /**
     * Call tested class instance public or non-public method with no arguments.
     *
     * @param string $methodName
     * @return mixed
     */
    protected function callDecapsulatorMethodWithNoArguments($methodName)
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
    protected function callDecapsulatorMethodWithArguments($methodName, $arguments)
    {
        $method = $this->decapsulatorReflection->getMethod($methodName);
        $method->setAccessible(true);
        $methodReturnedValue = $method->invokeArgs($this->decapsulator, $arguments);

        return $methodReturnedValue;
    }
}
