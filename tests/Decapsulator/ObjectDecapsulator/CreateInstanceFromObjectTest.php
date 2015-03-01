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
 * CreateInstanceFromObjectTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class CreateInstanceFromObjectTest extends AbstractStaticMethodsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'createInstanceFromObject';
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method
     * returns ObjectDecapsulator instance.
     */
    public function testReturnsCorrectInstance()
    {
        $arguments = array($this->decapsulatedObject);

        $this->decapsulator = $this->callTestedMethod($arguments);

        $this->assertInstanceOf('\Decapsulator\ObjectDecapsulator', $this->decapsulator);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method
     * sets object property correctly.
     */
    public function testSetsObjectCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->decapsulator = $this->callTestedMethod($arguments);

        $decapsulatorObject = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $decapsulatorObject);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method
     * sets reflection property correctly.
     */
    public function testSetsReflectionCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->decapsulator = $this->callTestedMethod($arguments);

        $decapsulatorReflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $decapsulatorReflection);
    }
}
