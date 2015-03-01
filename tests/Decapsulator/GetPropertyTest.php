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

use Decapsulator\AbstractPropertyAccessorsTest;

/**
 * GetPropertyTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class GetPropertyTest extends AbstractPropertyAccessorsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'getProperty';
    }

    /**
     * Test getProperty($name) method
     * gets property value correctly.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testGetsPropertyCorrectly($propertyName)
    {
        $expectedPropertyValue = 1024;
        $this->setDecapsulatedObjectProperty($propertyName, $expectedPropertyValue);

        $arguments = array($propertyName);

        $actualPropertyValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedPropertyValue, $actualPropertyValue);
    }
}
