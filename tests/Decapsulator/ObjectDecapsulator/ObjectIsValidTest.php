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

use Decapsulator\ObjectDecapsulator\AbstractStaticMethodsTest;

/**
 * ObjectIsValidTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectIsValidTest extends AbstractStaticMethodsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'objectIsValid';
    }

    /**
     * Test objectIsValid($object) method
     * returns false for argument of build-in type.
     */
    public function testReturnsFalseForBuildinType()
    {
        $object = 4;
        $arguments = array($object);

        $returnedValue = $this->callTestedMethod($arguments);

        $this->assertFalse($returnedValue);
    }

    /**
     * Test objectIsValid($object) method
     * returns true for argument being a class instance.
     */
    public function testReturnsTrueForObject()
    {
        $arguments = array($this->decapsulatedObject);

        $returnedValue = $this->callTestedMethod($arguments);

        $this->assertTrue($returnedValue);
    }
}
