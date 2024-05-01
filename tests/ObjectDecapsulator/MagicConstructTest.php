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
 * Magic construct test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class MagicConstructTest extends AbstractPropertyAccessorsTestCase
{
    /**
     * Test __construct() magic method
     * cannot be called.
     */
    public function testIsNotAvailable()
    {
        $isAvailable = $this->decapsulatorReflection->isInstantiable();

        $this->assertFalse($isAvailable);
    }
}
