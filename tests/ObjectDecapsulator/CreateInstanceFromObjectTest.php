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
 * Test for createInstanceFromObject.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class CreateInstanceFromObjectTest extends AbstractStaticMethodsTestCase
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

        $this->assertInstanceOf(self::DECAPSULATOR_CLASS, $this->decapsulator);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method
     * sets object property correctly.
     */
    public function testSetsObjectCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->decapsulator = $this->callTestedMethod($arguments);

        $object = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $object);
    }

    /**
     * Test createInstanceFromObjectSetsObject($object) method
     * sets reflection property correctly.
     */
    public function testSetsReflectionCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->decapsulator = $this->callTestedMethod($arguments);

        $reflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $reflection);
    }
}
