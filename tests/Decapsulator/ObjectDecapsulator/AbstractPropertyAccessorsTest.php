<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Decapsulator\ObjectDecapsulator;

use Decapsulator\ObjectDecapsulator\AbstractObjectDecapsulatorTest;

/**
 * ObjectDecapsulatorMagicAccessorsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractPropertyAccessorsTest extends AbstractObjectDecapsulatorTest
{
    /**
     * Names of the decapsulated object class properties.
     *
     * @var string
     */
    const NONEXISTENT_PROPERTY = 'nonexistentProperty';
    const PUBLIC_STATIC_PROPERTY = 'publicStaticProperty';
    const PROTECTED_STATIC_PROPERTY = 'protectedStaticProperty';
    const PRIVATE_STATIC_PROPERTY = 'privateStaticProperty';
    const PUBLIC_PROPERTY = 'publicProperty';
    const PROTECTED_PROPERTY = 'protectedProperty';
    const PRIVATE_PROPERTY = 'privateProperty';

    /**
     * Set up the fixtures and helpers.
     * Called before a test is executed.
     */
    public function setUp()
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
    protected function setDecapsulatedObjectProperty($name, $value)
    {
        $property = $this->decapsulatedObjectReflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->decapsulatedObject, $value);
    }

    /**
     * Get decapsualted object public or non-public property.
     *
     * @param string $name
     * @return mixed
     */
    protected function getDecapsulatedObjectProperty($name)
    {
        $property = $this->decapsulatedObjectReflection->getProperty($name);
        $property->setAccessible(true);
        $value = $property->getValue($this->decapsulatedObject);

        return $value;
    }

    /**
     * Provide existing properties names of the decapsulated object class.
     *
     * @return array[string]
     */
    public function existingPropertiesProvider()
    {
        $existingProperties = array(
            array(self::PUBLIC_STATIC_PROPERTY),
            array(self::PROTECTED_STATIC_PROPERTY),
            array(self::PRIVATE_STATIC_PROPERTY),
            array(self::PUBLIC_PROPERTY),
            array(self::PROTECTED_PROPERTY),
            array(self::PRIVATE_PROPERTY),
        );

        return $existingProperties;
    }
}
