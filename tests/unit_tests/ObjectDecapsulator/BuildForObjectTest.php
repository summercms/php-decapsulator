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

namespace ExOrg\Decapsulator\ObjectDecapsulator;

use PHPUnit\Framework\TestCase;
use ExOrg\Decapsulator\ObjectDecapsulator;

/**
 * Test of buildForObject method.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class BuildForObjectTest extends AbstractStaticMethodsTestCase
{
    /**
     * Test buildForObject($object) method
     * throws InvalidObjectException when $object is not valid.
     */
    public function testThrowsExceptionForNotValidObject()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Argument is not an object.');

        $object = 4;

        ObjectDecapsulator::buildForObject($object);
    }

    /**
     * Test buildForObject method
     * returns ObjectDecapsulatorInstance when $object id valid.
     */
    public function testReturnsCorrectInstanceForValidObject()
    {
        $decapsulator = ObjectDecapsulator::buildForObject($this->decapsulatedObject);

        $this->assertInstanceOf(self::DECAPSULATOR_CLASS, $decapsulator);
    }
}
