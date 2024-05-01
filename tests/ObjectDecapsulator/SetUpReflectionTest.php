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
 * Test for setUpReflection method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetUpReflectionTest extends AbstractNonStaticMethodsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName(): string
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

        $reflection = $this->getDecapsulatorProperty('reflection');

        $this->assertEquals($this->decapsulatedObjectReflection, $reflection);
    }
}
