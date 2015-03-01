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
use Decapsulator\ObjectDecapsulator;

/**
 * BuildForObjectTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class BuildForObjectTest extends AbstractStaticMethodsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'buildForObject';
    }

    /**
     * Test buildForObject($object) method
     * throws InvalidObjectException when $object is not valid.
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument is not an object.
     */
    public function testThrowsExceptionForNotValidObject()
    {
        $object = 4;
        $arguments = array($object);

        $returnedValue = $this->callTestedMethod($arguments);
    }

    /**
     * Test buildForObject($object) method
     * returns ObjectDecapsulatorInstance when $object id valid.
     */
    public function testReturnsCorrectInstanceForValidObject()
    {
        $decapsulator = ObjectDecapsulator::buildForObject($this->decapsulatedObject);

        $this->assertInstanceOf('Decapsulator\ObjectDecapsulator', $decapsulator);
    }

    /**
     * Test buildForObject($object) method
     * sets object property correctly when $object id valid.
     */
    public function testSetsObjectCorrectlyForValidObject()
    {
        $this->decapsulator = ObjectDecapsulator::buildForObject($this->decapsulatedObject);

        $object = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $object);
    }

    /**
     * Test buildForObject($object) method
     * sets reflection property correctly when $object id valid.
     */
    public function testSetsReflectionCorrectlyForValidObject()
    {
        $this->decapsulator = ObjectDecapsulator::buildForObject($this->decapsulatedObject);

        $reflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $reflection);
    }
}
