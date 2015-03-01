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

use Decapsulator\ObjectDecapsulator\AbstractPropertyAccessorsTest;

/**
 * MagicGetTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicGetTest extends AbstractPropertyAccessorsTest
{
    /**
     * Test __get($name) magic method
     * throws InvalidObjectException
     * when the property does not exist.
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Property does not exist.
     */
    public function testThrowsExceptionWhenPropertyDoesNotExist()
    {
        $propertyName = self::NONEXISTENT_PROPERTY_NAME;

        $this->decapsulator->$propertyName;
    }

    /**
     * Test __get($name, $value) magic method
     * gets property value correctly.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testGetsPropertyCorrectly($propertyName)
    {
        $expectedPropertyValue =  4;
        $this->setDecapsulatedObjectProperty($propertyName, $expectedPropertyValue);

        $actualPropertyValue = $this->decapsulator->$propertyName;

        $this->assertEquals($expectedPropertyValue, $actualPropertyValue);
    }
}
