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

/**
 * MagicCallTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicCallTest extends AbstractMethodAccessorsTest
{
    /**
     * Test _call($name, $arguments) magic method throws InvalidObjectException
     * when the called method does not exist.
     */
    public function testThrowsExceptionWhenMethodDoesNotExist()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Method does not exist.');

        $method = self::NONEXISTENT_METHOD;

        $this->decapsulator->$method(4);
    }

    /**
     * Test _call($name, $arguments) magic method calls method with no arguments correctly.
     *
     * @dataProvider noArgumentsMethodsAndReturnedValuesProvider
     * @param string $method
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodMethodWithNoArgumentsCorrectly($method, $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$method();

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test _call($name, $arguments) magic method calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsAndReturnedValuesProvider
     * @param string       $method
     * @param array[mixed] $arguments
     * @param string       $expectedReturnedValue
     */
    public function testCallsMethodMethodWithArgumentsCorrectly($method, $arguments, $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$method($arguments[0], $arguments[1]);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
