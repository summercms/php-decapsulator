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
 * CallMethodTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class CallMethodTest extends AbstractMethodAccessorsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'callMethod';
    }

    /**
     * Test callMethod($name, $arguments) method
     * calls method without argument correctly.
     *
     * @dataProvider noArgumentsMethodsAndReturnedValuesProvider
     * @param string $method
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodWithNoArgumentsCorrectly($method, $expectedReturnedValue)
    {
        $arguments = array($method);

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test callMethod($name, $arguments) method
     * calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsAndReturnedValuesProvider
     * @param string       $method
     * @param array[mixed] $methodArguments
     * @param string       $expectedReturnedValue
     */
    public function testCallsMethodWithArgumentsCorrectly($method, $methodArguments, $expectedReturnedValue)
    {
        $arguments = array(
            $method,
            $methodArguments,
        );

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
