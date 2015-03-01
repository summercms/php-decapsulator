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
 * SetObjectTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetObjectTest extends AbstractNonStaticMethodsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'setObject';
    }

    /**
     * Test setObject($object) method
     * sets object property correctly.
     */
    public function testSetObjectSetsObjectCorrectly()
    {
        $arguments = array($this->decapsulatedObject);

        $this->callTestedMethod($arguments);

        $object = $this->getDecapsulatorProperty('object');

        $this->assertSame($this->decapsulatedObject, $object);
    }
}
