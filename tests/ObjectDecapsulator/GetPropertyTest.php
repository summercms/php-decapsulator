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
 * Test for getProperty method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class GetPropertyTest extends AbstractPropertyAccessorsTestCase
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
     * @dataProvider existingPropertiesProvider
     * @param string $property
     */
    public function testGetsPropertyCorrectly($property)
    {
        $expectedValue = 1024;
        $this->setDecapsulatedObjectProperty($property, $expectedValue);

        $arguments = array($property);

        $actualValue = $this->callTestedMethod($arguments);

        $this->assertEquals($expectedValue, $actualValue);
    }
}
