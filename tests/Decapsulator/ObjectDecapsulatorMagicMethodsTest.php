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
 * ObjectDecapsulatorMagicMethodsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulatorMagicMethodsTest extends AbstractObjectDecapsulatorTest
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
     * Set up instance of tested class.
     *
     * @see \Decapsulator\AbstractObjectDecapsulatorTest::setUpDecapsulator()
     */
    public function setUpDecapsulator()
    {
        parent::setUpDecapsulator();

        $this->setUpDecapsulatedObjectReflectionOfDecapsulator();
        $this->setUpDecapsualatedObjectOfDecapsulator();
    }

    /**
     * Set up decapsulated object reflection property of tested class instance.
     */
    private function setUpDecapsulatedObjectReflectionOfDecapsulator()
    {
        $reflectionProperty = $this->decapsulatorReflection->getProperty('reflection');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->decapsulator, $this->decapsulatedObjectReflection);
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectOfDecapsulator()
    {
        $objectProperty = $this->decapsulatorReflection->getProperty('object');
        $objectProperty->setAccessible(true);
        $objectProperty->setValue($this->decapsulator, $this->decapsulatedObject);
    }

    /**
     * Get decapsualted object public or non-public property.
     *
     * @param string $propertyName
     * @return mixed
     */
    private function getDecapsulatedObjectProperty($propertyName)
    {
        $property = $this->decapsulatedObjectReflection->getProperty($propertyName);
        $property->setAccessible(true);
        $propertyValue = $property->getValue($this->decapsulatedObject);

        return $propertyValue;
    }

    /**
     * Test propertyExists($name) method returns false when the property does not exist.
     */
    public function testPropertyExistsReturnsFalseWhenPropertyDoesNotExist()
    {
        $propertyName = self::NONEXISTENT_PROPERTY_NAME;

        $methodReturnedValue = $this->callDecapsulatorMethodWithArguments('propertyExists', array($propertyName));

        $this->assertFalse($methodReturnedValue);
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

    /**
     * Test propertyExists($name) method returns true when the property exists.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testPropertyExistsReturnsTrueWhenPropertyExists($propertyName)
    {
        $methodReturnedValue = $this->callDecapsulatorMethodWithArguments('propertyExists', array($propertyName));

        $this->assertTrue($methodReturnedValue);
    }

    /**
     * Test setProperty($propertyName, $propertyValue) method sets given property value correctly.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testSetPropertySetsPropertyCorrectly($propertyName)
    {
        $expectedPropertyValue = 1024;
        $this->callDecapsulatorMethodWithArguments('setProperty', array($propertyName, $expectedPropertyValue));

        $actualPropertyValue = $this->getDecapsulatedObjectProperty($propertyName);

        $this->assertEquals($expectedPropertyValue, $actualPropertyValue);
    }
}
