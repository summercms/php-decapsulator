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

use Decapsulator\ObjectDecapsulator\AbstractMethodAccessorsTest;

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
        $arguments = array(self::NONEXISTENT_METHOD);

        $methodExists = $this->callTestedMethod($arguments);

        $this->assertFalse($methodExists);
    }

    /**
     * Test methodExists($name) method
     * returns true when the method exists.
     *
     * @dataProvider existingMethodsProvider
     * @param string $methodName
     */
    public function testReturnsTrueWhenMethodExists($methodName)
    {
        $arguments = array($methodName);

        $methodExists = $this->callTestedMethod($arguments);

        $this->assertTrue($methodExists);
    }
}
