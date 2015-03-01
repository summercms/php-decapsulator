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

use Decapsulator\ObjectDecapsulator\AbstractNonStaticMethodsTest;

/**
 * SetUpReflectionTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetUpReflectionTest extends AbstractNonStaticMethodsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'setUpReflection';
    }

    /**
     * Test setUpReflection() method sets reflection property correctly.
     */
    public function testSetUpReflectionSetsReflectionCorrectly()
    {
        $this->setDecapsulatorProperty('object', $this->decapsulatedObject);
        $this->callTestedMethod();

        $decapsulatorReflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $decapsulatorReflection);
    }
}
