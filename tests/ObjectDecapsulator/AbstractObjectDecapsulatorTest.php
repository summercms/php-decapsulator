<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Exorg\Decapsulator\ObjectDecapsulator;

use PHPUnit\Framework\TestCase;

/**
 * AbstractObjectDecapsulatorTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractObjectDecapsulatorTest extends TestCase
{
    /**
     * Name of the decapsulated object class.
     *
     * @var string
     */
    const DECAPSULATED_OBJECT_CLASS = '\Exorg\Decapsulator\ObjectDecapsulator\DemoClass';

    /**
     * Name of dacapsulator class.
     *
     * @var string
     */
    const DECAPSULATOR_CLASS = '\Exorg\Decapsulator\ObjectDecapsulator';

    /**
     * Reflection for the fixture class.
     *
     * @var \ReflectionClass
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected $decapsulatedObjectReflection;

    /**
     * Decapsulated object.
     * Instance of the fixture class.
     *
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected $decapsulatedObject;

    /**
     * Reflection for the testes class.
     *
     * @var \ReflectionClass
     */
    protected $decapsulatorReflection;

    /**
     * Instance of tested class.
     *
     * @var ObjectDecapsulator
     */
    protected $decapsulator = null;

    /**
     * Call tested method and return result.
     *
     * @param string $arguments
     * @return mixed
     */
    public function callTestedMethod($arguments = null)
    {
        $result = $this->callDecapsulatorMethod($this->provideTestedMethodName(), $arguments);

        return $result;
    }

    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return null;
    }

    /**
     * Initialize reflection for the decapsulated object fixture class.
     */
    protected function initDeapsulatedObjectReflection()
    {
        $class = self::DECAPSULATED_OBJECT_CLASS;
        $this->decapsulatedObjectReflection = new \ReflectionClass($class);
    }

    /**
     * Initialize decapsulated object fixture.
     */
    protected function initDecapsulatedObject()
    {
        $class = self::DECAPSULATED_OBJECT_CLASS;
        $this->decapsulatedObject = new $class();
    }

    /**
     * Initialize reflection for the tested class.
     */
    protected function initDecapsulatorReflection()
    {
        $class = self::DECAPSULATOR_CLASS;
        $this->decapsulatorReflection = new \ReflectionClass($class);
    }

    /**
     * Initialize instance of tested class.
     */
    protected function initDecapsulator()
    {
        $this->decapsulator = $this->decapsulatorReflection->newInstanceWithoutConstructor();
    }

    /**
     * Set-up properties of tested class instance.
     */
    protected function setUpDecapsulator()
    {
        $this->setUpDecapsulatedObjectReflectionOfDecapsulator();
        $this->setUpDecapsualatedObjectOfDecapsulator();
    }

    /**
     * Set tested class instance public or non-public property.
     *
     * @param string $name
     * @return mixed
     */
    protected function setDecapsulatorProperty($name, $value)
    {
        $property = $this->decapsulatorReflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->decapsulator, $value);
    }

    /**
     * Get tested class instance public or non-public property.
     *
     * @param string $name
     * @return mixed
     */
    protected function getDecapsulatorProperty($name)
    {
        $property = $this->decapsulatorReflection->getProperty($name);
        $property->setAccessible(true);
        $value = $property->getValue($this->decapsulator);

        return $value;
    }

    /**
     * Call tested class instance public or non-public method.
     *
     * @param string $name
     * @return mixed
     */
    protected function callDecapsulatorMethod($name, $arguments = array())
    {
        $argumentsExist = !empty($arguments);

        if ($argumentsExist) {
            $returnedValue = $this->callDecapsulatorMethodWithArguments($name, $arguments);
        } else {
            $returnedValue = $this->callDecapsulatorMethodWithNoArguments($name);
        }

        return $returnedValue;
    }

    /**
     * Set up decapsulated object reflection property of tested class instance.
     */
    private function setUpDecapsulatedObjectReflectionOfDecapsulator()
    {
        $this->setDecapsulatorProperty('reflection', $this->decapsulatedObjectReflection);
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectOfDecapsulator()
    {
        $this->setDecapsulatorProperty('object', $this->decapsulatedObject);
    }

    /**
     * Call tested class instance public or non-public method with no arguments.
     *
     * @param string $name
     * @return mixed
     */
    private function callDecapsulatorMethodWithNoArguments($name)
    {
        $method = $this->decapsulatorReflection->getMethod($name);
        $method->setAccessible(true);
        $returnedValue = $method->invoke($this->decapsulator);

        return $returnedValue;
    }

    /**
     * Call tested class instance public or non-public method with arguments.
     *
     * @param string $name
     * @param mixed[] $arguments
     * @return mixed
     */
    private function callDecapsulatorMethodWithArguments($name, $arguments)
    {
        $method = $this->decapsulatorReflection->getMethod($name);
        $method->setAccessible(true);
        $returnedValue = $method->invokeArgs($this->decapsulator, $arguments);

        return $returnedValue;
    }
}
