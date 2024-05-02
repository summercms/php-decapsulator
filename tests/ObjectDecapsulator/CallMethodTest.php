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
 * Test for callMethod method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class CallMethodTest extends AbstractMethodAccessorsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName(): string
    {
        return 'callMethod';
    }

    /**
     * Test callMethod($name, $arguments) method
     * calls method without argument correctly.
     *
     * @dataProvider noArgumentsMethodsAndReturnedValuesProvider
     *
     * @param string $method
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodWithNoArgumentsCorrectly(string $method, string $expectedReturnedValue)
    {
        $arguments = [$method];

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }

    /**
     * Test callMethod($name, $arguments) method
     * calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsAndReturnedValuesProvider
     *
     * @param string $method
     * @param mixed[] $methodArguments
     * @param string $expectedReturnedValue
     */
    public function testCallsMethodWithArgumentsCorrectly(string $method, array $methodArguments, string $expectedReturnedValue)
    {
        $arguments = [
            $method,
            $methodArguments,
        ];

        $actualReturnedValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedReturnedValue, $actualReturnedValue);
    }
}
