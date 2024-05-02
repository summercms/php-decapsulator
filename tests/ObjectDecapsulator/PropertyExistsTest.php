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
 * Test for propertyExists.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class PropertyExistsTest extends AbstractPropertyAccessorsTestCase
{
    /**
     * Provide tested method name.
     *
     * @param string $name
     */
    protected function provideTestedMethodName(): string
    {
        return 'propertyExists';
    }

    /**
     * Test propertyExists($name) method
     * returns false when the property does not exist.
     */
    public function testReturnsFalseWhenPropertyDoesNotExist()
    {
        $arguments = [self::NONEXISTENT_PROPERTY];

        $propertyExists = $this->callTestedMethod($arguments);

        $this->assertFalse($propertyExists);
    }

    /**
     * Test propertyExists($name) method
     * returns true when the property exists.
     *
     * @dataProvider existingPropertiesProvider
     *
     * @param string $propertyName
     */
    public function testReturnsTrueWhenPropertyExists(string $propertyName)
    {
        $arguments = [$propertyName];

        $propertyExists = $this->callTestedMethod($arguments);

        $this->assertTrue($propertyExists);
    }
}
