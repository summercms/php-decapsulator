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
 * Test for objectIsValid method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectIsValidTest extends AbstractStaticMethodsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName(): string
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
        $arguments = [$object];

        $objectIsValid = $this->callTestedMethod($arguments);

        $this->assertFalse($objectIsValid);
    }

    /**
     * Test objectIsValid($object) method
     * returns true for argument being a class instance.
     */
    public function testReturnsTrueForObject()
    {
        $arguments = [$this->decapsulatedObject];

        $objectIsValid = $this->callTestedMethod($arguments);

        $this->assertTrue($objectIsValid);
    }
}
