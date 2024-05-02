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
 * Magic call test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicCallTest extends AbstractMethodAccessorsTestCase
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
     *
     * @param string $method
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodMethodWithNoArgumentsCorrectly(string $method, string $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$method();

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test _call($name, $arguments) magic method calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsAndReturnedValuesProvider
     *
     * @param string $method
     * @param mixed[] $arguments
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodMethodWithArgumentsCorrectly(string $method, array $arguments, string $expectedReturnedValue)
    {
        $actualReturnedValue = $this->decapsulator->$method($arguments[0], $arguments[1]);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
