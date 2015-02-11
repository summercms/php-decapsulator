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

use Decapsulator\AbstractObjectDecapsulatorMagicMethodsTest;

/**
 * ObjectDecapsulatorMagicMethodsTest.
 * PHPUnit test class for ObjectDecapsulator class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulatorMagicCallTest extends AbstractObjectDecapsulatorMagicMethodsTest
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
     * Set up instance of tested class.
     *
     * @see \Decapsulator\AbstractObjectDecapsulatorTest::setUpDecapsulator()
     */
    public function setUpDecapsulator()
    {
        parent::setUpDecapsulator();

        $this->setUpDecapsualatedObjectOfDecapsulator();
        $this->setUpDecapsulatedObjectReflectionOfDecapsulator();
    }

    /**
     * Set up decapsulated object instance property of tested class instance.
     */
    private function setUpDecapsualatedObjectOfDecapsulator()
    {
        $objectProperty = $this->decapsulatorReflection->getProperty('object');
        $objectProperty->setAccessible(true);
        $objectProperty->setValue($this->decapsulator, $this->decapsulatedObject);
    }

    /**
     * Set up decapsulated object reflection property of tested class instance.
     */
    private function setUpDecapsulatedObjectReflectionOfDecapsulator()
    {
        $reflectionProperty = $this->decapsulatorReflection->getProperty('reflection');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->decapsulator, $this->decapsulatedObjectReflection);
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

    /**
     * Test methodExists($name) method returns false when the method does not exist.
     */
    public function testMethodExistsReturnsFalseWhenMethodDoesNotExist()
    {
        $methodName = self::NONEXISTENT_METHOD_NAME;

        $testedMethodReturnedValue = $this->callDecapsulatorMethodWithArguments('methodExists', array($methodName));

        $this->assertFalse($testedMethodReturnedValue);
    }

    /**
     * Test methodExists($name) method returns true when the method exists.
     *
     * @dataProvider existingMethodsNamesProvider
     * @param string $methodName
     */
    public function testMethodExistsReturnsTrueWhenMethodExists($methodName)
    {
        $testedMethodReturnedValue = $this->callDecapsulatorMethodWithArguments('methodExists', array($methodName));

        $this->assertTrue($testedMethodReturnedValue);
    }

    /**
     * Test callMethod($methodName, $methodArguments) method calls method without argument correctly.
     *
     * @dataProvider noArgumentsMethodsNamesAndReturnedValuesProvider
     * @param string $methodName
     * @param string $expectedMethodReturnedValue
     */
    public function testCallMethodCallsMethodWithNoArgumentsCorrectly($methodName, $expectedMethodReturnedValue)
    {
        $actualMethodReturnedValue = $this->callDecapsulatorMethodWithArguments('callMethod', array($methodName));

        $this->assertEquals($expectedMethodReturnedValue, $actualMethodReturnedValue);
    }

    /**
     * Test callMethod($methodName, $methodArguments) method calls method with arguments correctly.
     *
     * @dataProvider argumentsMethodsNamesAndReturnedValuesProvider
     * @param string $methodName
     * @param array[mixed] $methodArguments
     * @param string $expectedMethodReturnedValue
     */
    public function testCallMethodCallsMethodWithArgumentsCorrectly($methodName, $methodArguments, $expectedMethodReturnedValue)
    {
        $actualMethodReturnedValue = $this->callDecapsulatorMethodWithArguments('callMethod', array($methodName, array($methodArguments[0], $methodArguments[1])));

        $this->assertEquals($expectedMethodReturnedValue, $actualMethodReturnedValue);
    }
}
