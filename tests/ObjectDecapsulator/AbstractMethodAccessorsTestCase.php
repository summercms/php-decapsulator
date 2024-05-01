<?php

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
 * AbstractMethodAccessorsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
abstract class AbstractMethodAccessorsTestCase extends AbstractObjectDecapsulatorTestCase
{
    /**
     * Names of fixture class methods.
     *
     * @var unknown
     */
    const NONEXISTENT_METHOD = 'nonexistentMethod';
    const PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS = 'publicStaticMethodWithNoArguments';
    const PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS = 'protectedStaticMethodWithNoArguments';
    const PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS = 'privateStaticMethodWithNoArguments';
    const PUBLIC_STATIC_METHOD_WITH_ARGUMENTS = 'publicStaticMethodWithArguments';
    const PROTECTED_STATIC_METHOD_WITH_ARGUMENTS = 'protectedStaticMethodWithArguments';
    const PRIVATE_STATIC_METHOD_WITH_ARGUMENTS = 'privateStaticMethodWithArguments';
    const PUBLIC_METHOD_WITH_NO_ARGUMENTS = 'publicMethodWithNoArguments';
    const PROTECTED_METHOD_WITH_NO_ARGUMENTS = 'protectedMethodWithNoArguments';
    const PRIVATE_METHOD_WITH_NO_ARGUMENTS = 'privateMethodWithNoArguments';
    const PUBLIC_METHOD_WITH_ARGUMENTS = 'publicMethodWithArguments';
    const PROTECTED_METHOD_WITH_ARGUMENTS = 'protectedMethodWithArguments';
    const PRIVATE_METHOD_WITH_ARGUMENTS = 'privateMethodWithArguments';

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
     * @return array[array[string]]
     */
    public static function existingMethodsProvider()
    {
        $existingProperties = array(
            array(self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS),
            array(self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS),
            array(self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS),
            array(self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS),
            array(self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS),
            array(self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS),
            array(self::PUBLIC_METHOD_WITH_NO_ARGUMENTS),
            array(self::PROTECTED_METHOD_WITH_NO_ARGUMENTS),
            array(self::PRIVATE_METHOD_WITH_NO_ARGUMENTS),
            array(self::PUBLIC_METHOD_WITH_ARGUMENTS),
            array(self::PROTECTED_METHOD_WITH_ARGUMENTS),
            array(self::PRIVATE_METHOD_WITH_ARGUMENTS),
        );

        return $existingProperties;
    }

    /**
     * Provide methods with no arguments of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[array[string, string]]
     */
    public static function noArgumentsMethodsAndReturnedValuesProvider()
    {
        $noArgumentsMethodsAndReturnedValues = array(
            array(
                self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'public:static:no-arguments',
            ),
            array(
                self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'protected:static:no-arguments',
            ),
            array(
                self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS,
                'private:static:no-arguments',
            ),
            array(
                self::PUBLIC_METHOD_WITH_NO_ARGUMENTS,
                'public:no-arguments',
            ),
            array(
                self::PROTECTED_METHOD_WITH_NO_ARGUMENTS,
                'protected:no-arguments',
            ),
            array(
                self::PRIVATE_METHOD_WITH_NO_ARGUMENTS,
                'private:no-arguments',
            ),
        );

        return $noArgumentsMethodsAndReturnedValues;
    }

    /**
     * Provide arguments methods names of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[array[string, array[string, string], string]]
     */
    public static function argumentsMethodsAndReturnedValuesProvider()
    {
        $argumentsMethodsAndReturnedValues = array(
            array(
                self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'public:static:arguments:arg1+arg2',
            ),
            array(
                self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'protected:static:arguments:arg1+arg2',
            ),
            array(
                self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'private:static:arguments:arg1+arg2',
            ),
            array(
                self::PUBLIC_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'public:arguments:arg1+arg2',
            ),
            array(
                self::PROTECTED_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'protected:arguments:arg1+arg2',
            ),
            array(
                self::PRIVATE_METHOD_WITH_ARGUMENTS,
                array(
                    'arg1',
                    'arg2',
                ),
                'private:arguments:arg1+arg2',
            ),
        );

        return $argumentsMethodsAndReturnedValues;
    }
}
