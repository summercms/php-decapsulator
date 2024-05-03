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

/**
 * Method accessors test.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractMethodAccessorsTestCase extends AbstractObjectDecapsulatorTestCase
{
    /**
     * Names of fixture class methods.
     *
     * @var string
     */
    protected const NONEXISTENT_METHOD = 'nonexistentMethod';
    private const PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS = 'publicStaticMethodWithNoArguments';
    private const PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS = 'protectedStaticMethodWithNoArguments';
    private const PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS = 'privateStaticMethodWithNoArguments';
    private const PUBLIC_STATIC_METHOD_WITH_ARGUMENTS = 'publicStaticMethodWithArguments';
    private const PROTECTED_STATIC_METHOD_WITH_ARGUMENTS = 'protectedStaticMethodWithArguments';
    private const PRIVATE_STATIC_METHOD_WITH_ARGUMENTS = 'privateStaticMethodWithArguments';
    private const PUBLIC_METHOD_WITH_NO_ARGUMENTS = 'publicMethodWithNoArguments';
    private const PROTECTED_METHOD_WITH_NO_ARGUMENTS = 'protectedMethodWithNoArguments';
    private const PRIVATE_METHOD_WITH_NO_ARGUMENTS = 'privateMethodWithNoArguments';
    private const PUBLIC_METHOD_WITH_ARGUMENTS = 'publicMethodWithArguments';
    private const PROTECTED_METHOD_WITH_ARGUMENTS = 'protectedMethodWithArguments';
    private const PRIVATE_METHOD_WITH_ARGUMENTS = 'privateMethodWithArguments';

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->initDeapsulatedObjectReflection();
        $this->initDecapsulatedObject();
        $this->initDecapsulatorReflection();
        $this->initDecapsulator();
        $this->setUpDecapsulator();
    }

    /**
     * Provide existing methods names of the decapsulated object class.
     *
     * @return array[]
     */
    public static function existingMethodsProvider(): array
    {
        $existingProperties = [
            [self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS],
            [self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS],
            [self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS],
            [self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS],
            [self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS],
            [self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS],
            [self::PUBLIC_METHOD_WITH_NO_ARGUMENTS],
            [self::PROTECTED_METHOD_WITH_NO_ARGUMENTS],
            [self::PRIVATE_METHOD_WITH_NO_ARGUMENTS],
            [self::PUBLIC_METHOD_WITH_ARGUMENTS],
            [self::PROTECTED_METHOD_WITH_ARGUMENTS],
            [self::PRIVATE_METHOD_WITH_ARGUMENTS],
        ];

        return $existingProperties;
    }

    /**
     * Provide methods with no arguments of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[]
     */
    public static function noArgumentsMethodsAndReturnedValuesProvider(): array
    {
        $noArgumentsMethodsAndReturnedValues = [
            [
                self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'public:static:no-arguments',
            ],
            [
                self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'protected:static:no-arguments',
            ],
            [
                self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'private:static:no-arguments',
            ],
            [
                self::PUBLIC_METHOD_WITH_NO_ARGUMENTS,
                'public:no-arguments',
            ],
            [
                self::PROTECTED_METHOD_WITH_NO_ARGUMENTS,
                'protected:no-arguments',
            ],
            [
                self::PRIVATE_METHOD_WITH_NO_ARGUMENTS,
                'private:no-arguments',
            ],
        ];

        return $noArgumentsMethodsAndReturnedValues;
    }

    /**
     * Provide arguments methods names of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[]
     */
    public static function argumentsMethodsAndReturnedValuesProvider(): array
    {
        $argumentsMethodsAndReturnedValues = [
            [
                self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'public:static:arguments:arg1+arg2',
            ],
            [
                self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'protected:static:arguments:arg1+arg2',
            ],
            [
                self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'private:static:arguments:arg1+arg2',
            ],
            [
                self::PUBLIC_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'public:arguments:arg1+arg2',
            ],
            [
                self::PROTECTED_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'protected:arguments:arg1+arg2',
            ],
            [
                self::PRIVATE_METHOD_WITH_ARGUMENTS,
                [
                    'arg1',
                    'arg2',
                ],
                'private:arguments:arg1+arg2',
            ],
        ];

        return $argumentsMethodsAndReturnedValues;
    }
}
