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

/**
 * Object decapsulator magic accessors test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractPropertyAccessorsTestCase extends AbstractObjectDecapsulatorTestCase
{
    /**
     * Names of the decapsulated object class properties.
     *
     * @var string
     */
    protected const NONEXISTENT_PROPERTY = 'nonexistentProperty';
    private const PUBLIC_STATIC_PROPERTY = 'publicStaticProperty';
    private const PROTECTED_STATIC_PROPERTY = 'protectedStaticProperty';
    private const PRIVATE_STATIC_PROPERTY = 'privateStaticProperty';
    private const PUBLIC_PROPERTY = 'publicProperty';
    private const PROTECTED_PROPERTY = 'protectedProperty';
    private const PRIVATE_PROPERTY = 'privateProperty';

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->initDeapsulatedObjectReflection();
        $this->initDecapsulatedObject();
        $this->initDecapsulatorReflection();
        $this->initDecapsulator();
        $this->setUpDecapsulator();
    }

    /**
     * Set decapsualted object public or non-public property.
     *
     * @param string $name
     * @param mixed $value
     */
    protected function setDecapsulatedObjectProperty(string $name, mixed $value): void
    {
        $property = $this->decapsulatedObjectReflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->decapsulatedObject, $value);
    }

    /**
     * Get decapsualted object public or non-public property.
     *
     * @param string $name
     *
     * @return mixed
     */
    protected function getDecapsulatedObjectProperty(string $name): mixed
    {
        $property = $this->decapsulatedObjectReflection->getProperty($name);
        $property->setAccessible(true);
        $value = $property->getValue($this->decapsulatedObject);

        return $value;
    }

    /**
     * Provide existing properties names of the decapsulated object class.
     *
     * @return string[]
     */
    public static function existingPropertiesProvider(): array
    {
        $existingProperties = [
            [self::PUBLIC_STATIC_PROPERTY],
            [self::PROTECTED_STATIC_PROPERTY],
            [self::PRIVATE_STATIC_PROPERTY],
            [self::PUBLIC_PROPERTY],
            [self::PROTECTED_PROPERTY],
            [self::PRIVATE_PROPERTY],
        ];

        return $existingProperties;
    }
}
