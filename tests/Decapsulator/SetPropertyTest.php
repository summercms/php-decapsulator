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
 * SetPropertyTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetPropertyTest extends AbstractPropertyAccessorsTest
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName()
    {
        return 'setProperty';
    }

    /**
     * Test setProperty($name, $value) method
     * sets given property value correctly.
     *
     * @dataProvider existingPropertiesNamesProvider
     * @param string $propertyName
     */
    public function testSetsPropertyCorrectly($propertyName)
    {
        $expectedPropertyValue = 1024;

        $arguments = array(
            $propertyName,
            $expectedPropertyValue,
        );

        $this->callTestedMethod($arguments);

        $actualPropertyValue = $this->getDecapsulatedObjectProperty($propertyName);

        $this->assertEquals($expectedPropertyValue, $actualPropertyValue);
    }
}
