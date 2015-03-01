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

use Decapsulator\AbstractMethodAccessorsTest;

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
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Method does not exist.
     */
    public function testThrowsExceptionWhenMethodDoesNotExist()
    {
        $methodName = self::NONEXISTENT_METHOD_NAME;

        $this->decapsulator->$methodName(4);
    }

    /**
     * Test _call($name, $arguments) magic method calls method with no arguments correctly.
     *
     * @dataProvider noArgumentsMethodsNamesAndReturnedValuesProvider
     * @param string $methodName
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodMethodWithNoArgumentsCorrectly($methodName, $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$methodName();

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test _call($name, $arguments) magic method calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsNamesAndReturnedValuesProvider
     * @param string       $methodName
     * @param array[mixed] $arguments
     * @param string       $expectedReturnedValue
     */
    public function testCallsMethodMethodWithArgumentsCorrectly($methodName, $arguments, $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$methodName($arguments[0], $arguments[1]);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
