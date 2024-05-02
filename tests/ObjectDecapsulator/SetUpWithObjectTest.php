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
 * Test for setUpWithObject method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetUpWithObjectTest extends AbstractNonStaticMethodsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName(): string
    {
        return 'setUpWithObject';
    }

    /**
     * Test setUpWithObject($object) method
     * sets object property correctly.
     */
    public function testSetsObjectCorrectly()
    {
        $arguments = [$this->decapsulatedObject];

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
        $arguments = [$this->decapsulatedObject];

        $this->callTestedMethod($arguments);

        $reflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $reflection);
    }
}
