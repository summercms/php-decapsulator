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
 * SetUpWithObjectTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetUpWithObjectTest extends AbstractNonStaticMethodsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'setUpWithObject';
    }

    /**
     * Test setUpWithObject($object) method
     * sets object property correctly.
     */
    public function testSetsObjectCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->callTestedMethod($arguments);

        $object = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $object);
    }

    /**
     * Test setUpWithObject($object) method
     * sets reflection property correctly.
     */
    public function testSetsReflectionCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->callTestedMethod($arguments);

        $reflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $reflection);
    }
}
