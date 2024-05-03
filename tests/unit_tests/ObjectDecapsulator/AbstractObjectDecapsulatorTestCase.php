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

namespace ExOrg\Decapsulator\ObjectDecapsulator;

use PHPUnit\Framework\TestCase;
use ExOrg\Decapsulator\ObjectDecapsulator;

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
     * Full qualified name of the decapsulated object class.
     *
     * @var string
     */
    private const DECAPSULATED_OBJECT_CLASS = '\ExOrg\Decapsulator\DemoClass';

    /**
     * Full qualified name of dacapsulator class.
     *
     * @var string
     */
    protected const DECAPSULATOR_CLASS = '\ExOrg\Decapsulator\ObjectDecapsulator';

    /**
     * Reflection for the fixture class.
     *
     * @var \ReflectionClass
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected \ReflectionClass $decapsulatedObjectReflection;

    /**
     * Instance of the fixture class.
     *
     * @see DecapsulatorTest::DECAPSULATED_OBJECT_CLASS
     */
    protected object $decapsulatedObject;

    /**
     * Reflection for the tested class.
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
        $this->setUpDecapsulatedObjectReflectionWithinDecapsulator();
        $this->setUpDecapsualatedObjectWithinDecapsulator();
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
     * Set up decapsulated object reflection property of tested class instance.
     */
    private function setUpDecapsulatedObjectReflectionWithinDecapsulator(): void
    {
        $this->setDecapsulatorProperty('reflection', $this->decapsulatedObjectReflection);
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectWithinDecapsulator(): void
    {
        $this->setDecapsulatorProperty('object', $this->decapsulatedObject);
    }
}
