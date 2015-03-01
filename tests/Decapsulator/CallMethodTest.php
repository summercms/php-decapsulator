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
 * CallMethodTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class CallMethodTest extends AbstractMethodAccessorsTest
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
     * @dataProvider noArgumentsMethodsNamesAndReturnedValuesProvider
     * @param string $methodName
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodWithNoArgumentsCorrectly($methodName, $expectedReturnedValue)
    {
        $arguments = array($methodName);

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test callMethod($name, $arguments) method
     * calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsNamesAndReturnedValuesProvider
     * @param string       $methodName
     * @param array[mixed] $methodArguments
     * @param string       $expectedReturnedValue
     */
    public function testMethodWithArgumentsCorrectly($methodName, $methodArguments, $expectedReturnedValue)
    {
        $arguments = array(
            $methodName,
            $methodArguments,
        );

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
