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
 * Test for setProperty method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class SetPropertyTest extends AbstractPropertyAccessorsTestCase
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
     * @dataProvider existingPropertiesProvider
     * @param string $property
     */
    public function testSetsPropertyCorrectly($property)
    {
        $expectedValue = 1024;

        $arguments = array(
            $property,
            $expectedValue,
        );

        $this->callTestedMethod($arguments);

        $actualValue = $this->getDecapsulatedObjectProperty($property);

        $this->assertEquals($expectedValue, $actualValue);
    }
}
