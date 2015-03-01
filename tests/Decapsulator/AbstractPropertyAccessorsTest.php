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
    const NONEXISTENT_PROPERTY_NAME = 'nonexistentProperty';
    const PUBLIC_STATIC_PROPERTY_NAME = 'publicStaticProperty';
    const PROTECTED_STATIC_PROPERTY_NAME = 'protectedStaticProperty';
    const PRIVATE_STATIC_PROPERTY_NAME = 'privateStaticProperty';
    const PUBLIC_PROPERTY_NAME = 'publicProperty';
    const PROTECTED_PROPERTY_NAME = 'protectedProperty';
    const PRIVATE_PROPERTY_NAME = 'privateProperty';

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
    public function existingPropertiesNamesProvider()
    {
        $existingPropertiesNames = array(
            array(self::PUBLIC_STATIC_PROPERTY_NAME),
            array(self::PROTECTED_STATIC_PROPERTY_NAME),
            array(self::PRIVATE_STATIC_PROPERTY_NAME),
            array(self::PUBLIC_PROPERTY_NAME),
            array(self::PROTECTED_PROPERTY_NAME),
            array(self::PRIVATE_PROPERTY_NAME),
        );

        return $existingPropertiesNames;
    }
}
