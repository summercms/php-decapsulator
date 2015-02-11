<?php

/*
 * This file is part of the Decapsulator package.
 *
 * (c) Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Decapsulator;

use Decapsulator\AbstractObjectDecapsulatorTest;

/**
 * AbstractObjectDecapsulatorMagicMethodsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractObjectDecapsulatorMagicMethodsTest extends AbstractObjectDecapsulatorTest
{
    /**
     * Set up instance of tested class.
     *
     * @see \Decapsulator\AbstractObjectDecapsulatorTest::setUpDecapsulator()
     */
    public function setUpDecapsulator()
    {
        parent::setUpDecapsulator();

        $this->setUpDecapsualatedObjectOfDecapsulator();
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectOfDecapsulator()
    {
        $objectProperty = $this->decapsulatorReflection->getProperty('object');
        $objectProperty->setAccessible(true);
        $objectProperty->setValue($this->decapsulator, $this->decapsulatedObject);
    }
}
