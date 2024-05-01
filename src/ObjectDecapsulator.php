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

namespace ExOrg\Decapsulator;

/**
 * Object decapsulator.
 * Decapsulator for object.
 * Provider direct access to non-public properties and methods
 * of the class of the wrapped object.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) Katarzyna Krasińska
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/exorg/decapsulator
 */
class ObjectDecapsulator
{
    /**
     * Valid decapsulated object type.
     *
     * @var unknown
     */
    const VALID_OBJECT_TYPE = 'object';

    /**
     * Decapsulated object.
     *
     * @var mixed
     */
    private $object;

    /**
     * Reflection for decapsulated object.
     *
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * Constructor not available for public usage.
     */
    private function __construct()
    {
        // Default action.
    }

    /**
     * Build ObjectDecapsulator instance for given decapsulated object.
     *
     * @param mixed $object
     * @throws \InvalidArgumentException
     * @return \Decapsulator\ObjectDecapsulator
     */
    public static function buildForObject($object)
    {
        if (self::objectIsValid($object)) {
            $decapsulator = self::createInstanceFromObject($object);

            return $decapsulator;
        } else {
            $message = 'Argument is not an object.';
            $exception = new \InvalidArgumentException($message);

            throw $exception;
        }
    }

    /**
     * Magically set object choosen property value.
     * Called when property is set directly by the property name.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        $propertyExists = $this->propertyExists($name);

        if ($propertyExists) {
            $this->setProperty($name, $value);
        } else {
            $message = 'Property does not exist.';
            $exception = new \InvalidArgumentException($message);

            throw $exception;
        }
    }

    /**
     * Magically get object choosen property value.
     * Called when property is get directly by the property name.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $propertyExists = $this->propertyExists($name);

        if ($propertyExists) {
            $value = $this->getProperty($name);

            return $value;
        } else {
            $message = 'Property does not exist.';
            $exception = new \InvalidArgumentException($message);

            throw $exception;
        }
    }

    /**
     * Magically call object choosen method.
     * Called when method is called directly by the method name.
     *
     * @param string       $name
     * @param array[mixed] $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $methodExists = $this->methodExists($name);

        if ($methodExists) {
            $result = $this->callMethod($name, $arguments);

            return $result;
        } else {
            $message = 'Method does not exist.';
            $exception = new \InvalidArgumentException($message);

            throw $exception;
        }
    }

    /**
     * Check object is valid instance of the class.
     *
     * @param mixed $object
     * @return bool
     */
    private static function objectIsValid($object)
    {
        $objectType = gettype($object);
        $objectIsValid = ($objectType === self::VALID_OBJECT_TYPE);

        return $objectIsValid;
    }

    /**
     * Create ObjectDecapsulator instance wrapped given object.
     *
     * @param mixed $object
     * @return \Decapsulator\ObjectDecapsulator
     */
    private static function createInstanceFromObject($object)
    {
        $instance = new self();
        $instance->setUpWithObject($object);

        return $instance;
    }

    /**
     * Set-up instance properties with object data.
     *
     * @param mixed $object
     */
    private function setUpWithObject($object)
    {
        $this->setObject($object);
        $this->setUpReflection();
    }

    /**
     * Set decapsulated object.
     *
     * @param mixed $object
     */
    private function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * Set-up reflection for decapsulated object.
     */
    private function setUpReflection()
    {
        $className = get_class($this->object);
        $this->reflection = new \ReflectionClass($className);
    }

    /**
     * Check object property with given name exists.
     *
     * @param string $name
     * @throws \UnexpectedValueException
     * @return boolean
     */
    private function propertyExists($name)
    {
        $className = get_class($this->object);
        $propertyExists = property_exists($className, $name);

        return $propertyExists;
    }

    /**
     * Check object method with given name exists.
     *
     * @param string $name
     * @throws \UnexpectedValueException
     * @return boolean
     */
    private function methodExists($name)
    {
        $methodExists = method_exists($this->object, $name);

        return $methodExists;
    }

    /**
     * Set value of the given object property.
     *
     * @param string $name
     * @param mixed $value
     */
    private function setProperty($name, $value)
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->object, $value);
    }

    /**
     * Get value of the given object property.
     *
     * @param string $name
     * @return mixed
     */
    private function getProperty($name)
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);
        $value = $property->getValue($this->object);

        return $value;
    }

    /**
     * Call given object method.
     *
     * @param string       $name
     * @param array[mixed] $arguments
     * @return mixed
     */
    private function callMethod($name, $arguments = array())
    {
        $method = $this->reflection->getMethod($name);
        $method->setAccessible(true);
        $result = $method->invokeArgs($this->object, $arguments);

        return $result;
    }
}
