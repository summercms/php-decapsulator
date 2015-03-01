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
 * MagicConstructTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicConstructTest extends AbstractPropertyAccessorsTest
{
    /**
     * Test __construct() magic method
     * cannot be called.
     */
    public function testIsNotAvailable()
    {
        $available = $this->decapsulatorReflection->isInstantiable();

        $this->assertFalse($available);
    }
}
