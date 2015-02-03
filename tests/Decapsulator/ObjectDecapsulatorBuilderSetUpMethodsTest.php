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

use Decapsulator\AbstractObjectDecapsulatorBuilderMethodsTest;

/**
 * ObjectDecapsulatorBuilderSetUpMethodsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulatorBuilderSetUpMethodsTest extends AbstractObjectDecapsulatorBuilderMethodsTest
{
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
