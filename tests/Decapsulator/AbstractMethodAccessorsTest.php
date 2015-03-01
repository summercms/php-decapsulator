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

use Decapsulator\AbstractObjectDecapsulatorTest;

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
abstract class AbstractMethodAccessorsTest extends AbstractObjectDecapsulatorTest
{
    /**
     * Names of fixture class methods.
     *
     * @var unknown
     */
    const NONEXISTENT_METHOD_NAME = 'nonexistentMethod';
    const PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME = 'publicStaticMethodWithNoArguments';
    const PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME = 'protectedStaticMethodWithNoArguments';
    const PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME = 'privateStaticMethodWithNoArguments';
    const PUBLIC_STATIC_METHOD_WITH_ARGUMENTS_NAME = 'publicStaticMethodWithArguments';
    const PROTECTED_STATIC_METHOD_WITH_ARGUMENTS_NAME = 'protectedStaticMethodWithArguments';
    const PRIVATE_STATIC_METHOD_WITH_ARGUMENTS_NAME = 'privateStaticMethodWithArguments';
    const PUBLIC_METHOD_WITH_NO_ARGUMENTS_NAME = 'publicMethodWithNoArguments';
    const PROTECTED_METHOD_WITH_NO_ARGUMENTS_NAME = 'protectedMethodWithNoArguments';
    const PRIVATE_METHOD_WITH_NO_ARGUMENTS_NAME = 'privateMethodWithNoArguments';
    const PUBLIC_METHOD_WITH_ARGUMENTS_NAME = 'publicMethodWithArguments';
    const PROTECTED_METHOD_WITH_ARGUMENTS_NAME = 'protectedMethodWithArguments';
    const PRIVATE_METHOD_WITH_ARGUMENTS_NAME = 'privateMethodWithArguments';

    /**
     * Set up the fixtures and helpers.
     * Called before a test is executed.
     */
    public function setUp()
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
    public function existingMethodsNamesProvider()
    {
        $existingPropertiesNames = array(
            array(self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS_NAME),
            array(self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS_NAME),
            array(self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS_NAME),
            array(self::PUBLIC_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PROTECTED_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PRIVATE_METHOD_WITH_NO_ARGUMENTS_NAME),
            array(self::PUBLIC_METHOD_WITH_ARGUMENTS_NAME),
            array(self::PROTECTED_METHOD_WITH_ARGUMENTS_NAME),
            array(self::PRIVATE_METHOD_WITH_ARGUMENTS_NAME),
        );

        return $existingPropertiesNames;
    }

    /**
     * Provide methods with no arguments of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[array[string, string]]
     */
    public function noArgumentsMethodsNamesAndReturnedValuesProvider()
    {
        $noArgumentsMethodsNamesAndReturnedValues = array(
            array(
                self::PUBLIC_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME,
                'public:static:no-arguments',
            ),
            array(
                self::PROTECTED_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME,
                'protected:static:no-arguments',
            ),
            array(
                self::PRIVATE_STATIC_METHOD_WITH_NO_ARGUMENTS_NAME,
                'private:static:no-arguments',
            ),
            array(
                self::PUBLIC_METHOD_WITH_NO_ARGUMENTS_NAME,
                'public:no-arguments',
            ),
            array(
                self::PROTECTED_METHOD_WITH_NO_ARGUMENTS_NAME,
                'protected:no-arguments',
            ),
            array(
                self::PRIVATE_METHOD_WITH_NO_ARGUMENTS_NAME,
                'private:no-arguments',
            ),
        );

        return $noArgumentsMethodsNamesAndReturnedValues;
    }

    /**
     * Provide arguments methods names of the decapsulated object class
     * and the values returned by these metods.
     *
     * @return array[array[string, array[string, string], string]]
     */
    public function argumentsMethodsNamesAndReturnedValuesProvider()
    {
        $argumentsMethodsNamesAndReturnedValues = array(
            array(
                self::PUBLIC_STATIC_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'public:static:arguments:arg1+arg2',
            ),
            array(
                self::PROTECTED_STATIC_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'protected:static:arguments:arg1+arg2',
            ),
            array(
                self::PRIVATE_STATIC_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'private:static:arguments:arg1+arg2',
            ),
            array(
                self::PUBLIC_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'public:arguments:arg1+arg2',
            ),
            array(
                self::PROTECTED_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'protected:arguments:arg1+arg2',
            ),
            array(
                self::PRIVATE_METHOD_WITH_ARGUMENTS_NAME,
                array(
                    'arg1',
                    'arg2',
                ),
                'private:arguments:arg1+arg2',
            ),
        );

        return $argumentsMethodsNamesAndReturnedValues;
    }
}
