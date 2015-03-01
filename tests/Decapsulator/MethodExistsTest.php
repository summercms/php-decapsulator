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
 * MethodExistsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MethodExistsTest extends AbstractMethodAccessorsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'methodExists';
    }

    /**
     * Test methodExists($name) method
     * returns false when the method does not exist.
     */
    public function testReturnsFalseWhenMethodDoesNotExist()
    {
        $arguments = array(self::NONEXISTENT_METHOD_NAME);

        $returnedValue = $this->callTestedMethod($arguments);

        $this->assertFalse($returnedValue);
    }

    /**
     * Test methodExists($name) method
     * returns true when the method exists.
     *
     * @dataProvider existingMethodsNamesProvider
     * @param string $methodName
     */
    public function testReturnsTrueWhenMethodExists($methodName)
    {
        $arguments = array($methodName);

        $returnedValue = $this->callTestedMethod($arguments);

        $this->assertTrue($returnedValue);
    }
}
