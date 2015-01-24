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

/**
 * DemoClass.
 * Fixture class for DecapsulatorTest test class.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://framework.zend.com/license/new-bsd New BSD License
 * @link http://github.com/exorg/decapsulator
 */
class DemoClass
{
    /**
     * Public static property.
     *
     * @var mixed
     */
    public static $publicStaticProperty;

    /**
     * Protected static property.
     *
     * @var mixed
     */
    protected static $protectedStaticProperty;

    /**
     * Private static property.
     *
     * @var mixed
     */
    private static $privateStaticProperty;

    /**
     * Public property.
     *
     * @var mixed
     */
    public $publicProperty;

    /**
     * Protected property.
     *
     * @var mixed
     */
    protected $protectedProperty;

    /**
     * Private property.
     *
     * @var mixed
     */
    private $privateProperty;

    /**
     * Public static method with no arguments.
     *
     * @return string
     */
    public function publicStaticMethodWithNoArgumnets()
    {
        return 'public:static:no-arguments';
    }

    /**
     * Protected static method with no arguments.
     *
     * @return string
     */
    protected static function protectedStaticMethodWithNoArguments()
    {
        return 'protected:static:no-arguments';
    }

    /**
     * Private static method with no arguments.
     *
     * @return string
     */
    private static function privateStaticMethodWithNoArguments()
    {
        return 'private:static:no-argumnts';
    }

    /**
     * Public static method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    public static function publicStaticMethodWithArguments($argument1, $argument2)
    {
        return 'public:static:' . $argument1 . '+' . $argument2;
    }

    /**
     * Protected static method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    protected static function protectedStaticMethodWithArguments($argument1, $argument2)
    {
        return 'protected:static:' . $argument1 . '+' . $argument2;
    }

    /**
     * Private static method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    private static function privateStaticMethodWithArguments($argument1, $argument2)
    {
        return 'private:static:' . $argument1 . '+' . $argument2;
    }

    /**
     * Public method with no arguments.
     *
     * @return string
     */
    public function publicMethodWithNoArgumnets()
    {
        return 'public:no-arguments';
    }

    /**
     * Protected method with no arguments.
     *
     * @return string
     */
    protected function protectedMethodWithNoArguments()
    {
        return 'protected:no-arguments';
    }

    /**
     * Private method with no arguments.
     *
     * @return string
     */
    private function privateMethodWithNoArguments()
    {
        return 'private:no-argumnts';
    }

    /**
     * Public method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    public function publicMethodWithArguments($argument1, $argument2)
    {
        return 'public:' . $argument1 . '+' . $argument2;
    }

    /**
     * Protected method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    protected function protectedMethodWithArguments($argument1, $argument2)
    {
        return 'protected:' . $argument1 . '+' . $argument2;
    }

    /**
     * Private method with arguments.
     *
     * @param mixed $argument1
     * @param mixed $argument2
     * @return string
     */
    private function privateMethodWithArguments($argument1, $argument2)
    {
        return 'private:' . $argument1 . '+' . $argument2;
    }
}
