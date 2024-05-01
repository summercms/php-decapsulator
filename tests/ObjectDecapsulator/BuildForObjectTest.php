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

use Exorg\Decapsulator\ObjectDecapsulator;

/**
 * Test of buildForObject method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class BuildForObjectTest extends AbstractStaticMethodsTestCase
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
     */
    public function testThrowsExceptionForNotValidObject()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Argument is not an object.');

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

        $this->assertInstanceOf(self::DECAPSULATOR_CLASS, $decapsulator);
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
