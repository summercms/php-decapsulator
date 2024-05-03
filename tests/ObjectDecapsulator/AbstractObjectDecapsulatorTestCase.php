<?php

declare(strict_types=1);

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
use Exorg\Decapsulator\ObjectDecapsulator;

/**
 * Object decapsulator test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractObjectDecapsulatorTestCase extends TestCase
{
    /**
     * Name of the decapsulated object class.
     *
     * @var string
     */
    private const DECAPSULATED_OBJECT_CLASS = '\Exorg\Decapsulator\ObjectDecapsulator\DemoClass';

    /**
     * Name of dacapsulator class.
     *
     * @var string
     */
    protected const DECAPSULATOR_CLASS = '\Exorg\Decapsulator\ObjectDecapsulator';

    /**
     * Reflection for the fixture class.
     *
     * @var \ReflectionClass
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected \ReflectionClass $decapsulatedObjectReflection;

    /**
     * Decapsulated object.
     * Instance of the fixture class.
     *
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected object $decapsulatedObject;

    /**
     * Reflection for the testes class.
     *
     * @var \ReflectionClass
     */
    protected \ReflectionClass $decapsulatorReflection;

    /**
     * Instance of tested class.
     *
     * @var ObjectDecapsulator
     */
    protected ObjectDecapsulator $decapsulator;

    /**
     * Call tested method and return result.
     *
     * @param string $arguments
     *
     * @return mixed
     */
    public function callTestedMethod(array $arguments = []): mixed
    {
        $result = $this->callDecapsulatorMethod($this->provideTestedMethodName(), $arguments);

        return $result;
    }

    /**
     * Provide tested method name.
     *
     * @return string $name
     */
    protected function provideTestedMethodName(): string
    {
        return '';
    }

    /**
     * Initialize reflection for the decapsulated object fixture class.
     */
    protected function initDeapsulatedObjectReflection(): void
    {
        $this->decapsulatedObjectReflection = new \ReflectionClass(self::DECAPSULATED_OBJECT_CLASS);
    }

    /**
     * Initialize decapsulated object fixture.
     */
    protected function initDecapsulatedObject(): void
    {
        $class = self::DECAPSULATED_OBJECT_CLASS;
        $this->decapsulatedObject = new $class();
    }

    /**
     * Initialize reflection for the tested class.
     */
    protected function initDecapsulatorReflection(): void
    {
        $this->decapsulatorReflection = new \ReflectionClass(self::DECAPSULATOR_CLASS);
    }

    /**
     * Initialize instance of tested class.
     */
    protected function initDecapsulator(): void
    {
        $this->decapsulator = $this->decapsulatorReflection->newInstanceWithoutConstructor();
    }

    /**
     * Set-up properties of tested class instance.
     */
    protected function setUpDecapsulator(): void
    {
        $this->setUpDecapsulatedObjectReflectionOfDecapsulator();
        $this->setUpDecapsualatedObjectOfDecapsulator();
    }

    /**
     * Set tested class instance public or non-public property.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    protected function setDecapsulatorProperty(string $name, mixed $value): void
    {
        $property = $this->decapsulatorReflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->decapsulator, $value);
    }

    /**
     * Get tested class instance public or non-public property.
     *
     * @param string $name
     *
     * @return mixed
     */
    protected function getDecapsulatorProperty(string $name): mixed
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
     * @param mixed[] $arguments
     *
     * @return mixed
     */
    protected function callDecapsulatorMethod(string $name, array $arguments = []): mixed
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
    private function setUpDecapsulatedObjectReflectionOfDecapsulator(): void
    {
        $this->setDecapsulatorProperty('reflection', $this->decapsulatedObjectReflection);
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectOfDecapsulator(): void
    {
        $this->setDecapsulatorProperty('object', $this->decapsulatedObject);
    }

    /**
     * Call tested class instance public or non-public method with no arguments.
     *
     * @param string $name
     *
     * @return mixed
     */
    private function callDecapsulatorMethodWithNoArguments($name): mixed
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
     *
     * @return mixed
     */
    private function callDecapsulatorMethodWithArguments(string $name, array $arguments): mixed
    {
        $method = $this->decapsulatorReflection->getMethod($name);
        $method->setAccessible(true);
        $returnedValue = $method->invokeArgs($this->decapsulator, $arguments);

        return $returnedValue;
    }
}
