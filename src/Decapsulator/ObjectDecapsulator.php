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
 * ObjectDecapsulator.
 * Decapsulator for object.
 * Provider direct access to non-public properties and methods
 * of the class of the wrapped object.
 *
 * @package Decapsulator
 * @author Katarzyna Krasińska <katheroine@gmail.com>
 * @copyright Copyright (c) 2015 Katarzyna Krasińska
 * @license http://framework.zend.com/license/new-bsd New BSD License
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
     * Build ObjectDecapsulator instance for given decapsulated object.
     *
     * @param mixed $object
     * @throws \InvalidArgumentException
     * @return \Decapsulator\ObjectDecapsulator
     */
    public function buildForObject($object)
    {
        if (self::objectIsValid($object)) {
            $objectDecapsulator = self::createInstanceFromObject($object);

            return $objectDecapsulator;
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
     * @param string $propertyName
     * @param mixed $propertyValue
     */
    public function __set($propertyName, $propertyValue)
    {
        $propertyExists = $this->propertyExists($propertyName);

        if ($propertyExists) {
            $this->setProperty($propertyName, $propertyValue);
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
     * @param string $propertyName
     * @return mixed
     */
    public function __get($propertyName)
    {
        $propertyExists = $this->propertyExists($propertyName);

        if ($propertyExists) {
            $propertyValue = $this->getProperty($propertyName);

            return $propertyValue;
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
     * @param string $methodName
     * @param array[mixed] $methodArguments
     * @return mixed
     */
    public function __call($methodName, $methodArguments)
    {
        $methodExists = $this->methodExists($methodName);

        if ($methodExists) {
            $methodResult = $this->callMethod($methodName, $methodArguments);

            return $methodResult;
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
    private function objectIsValid($object)
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
    private function createInstanceFromObject($object)
    {
        $objectDecapsulator = new self();
        $objectDecapsulator->setUpWithObject($object);

        return $objectDecapsulator;
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
     * @param string $propertyName
     * @throws \UnexpectedValueException
     * @return boolean
     */
    private function propertyExists($propertyName)
    {
        $objectClassName = get_class($this->object);
        $propertyExists = property_exists($objectClassName, $propertyName);

        return $propertyExists;
    }

    /**
     * Check object method with given name exists.
     *
     * @param string $methodName
     * @throws \UnexpectedValueException
     * @return boolean
     */
    private function methodExists($methodName)
    {
        $objectClassName = get_class($this->object);
        $methodExists = method_exists($this->object, $methodName);

        return $methodExists;
    }

    /**
     * Set value of the given object property.
     *
     * @param string $propertyName
     * @param mixed $propertyValue
     */
    private function setProperty($propertyName, $propertyValue)
    {
        $property = $this->reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($this->object, $propertyValue);
    }

    /**
     * Get value of the given object property.
     *
     * @param string $propertyName
     * @return mixed
     */
    private function getProperty($propertyName)
    {
        $property = $this->reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $propertyValue = $property->getValue($this->object);

        return $propertyValue;
    }

    /**
     * Call given object method.
     *
     * @param string $methodName
     * @param array[mixed] $methodArguments
     * @return mixed
     */
    private function callMethod($methodName, $methodArguments = array())
    {
        $method = $this->reflection->getMethod($methodName);
        $method->setAccessible(true);
        $methodResult = $method->invokeArgs($this->object, $methodArguments);

        return $methodResult;
    }
}
