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
 * Magic set test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicSetTest extends AbstractPropertyAccessorsTestCase
{
    /**
     * Test __set($name, $value) magic method
     * throws InvalidObjectException
     * when the property does not exist.
     */
    public function testThrowsExceptionWhenPropertyDoesNotExist()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Property does not exist.');

        $property = self::NONEXISTENT_PROPERTY;

        $this->decapsulator->$property = 4;
    }

    /**
     * Test __set($name, $value) magic method
     * sets given property value correctly.
     *
     * @dataProvider existingPropertiesProvider
     * @param string $property
     */
    public function testSetsPropertyCorrectly($property)
    {
        $expectedValue = 4;
        $this->decapsulator->$property = $expectedValue;

        $actualValue = $this->getDecapsulatedObjectProperty($property);

        $this->assertEquals($expectedValue, $actualValue);
    }
}
