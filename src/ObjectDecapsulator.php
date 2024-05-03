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
     * @var string
     */
    private const VALID_OBJECT_TYPE = 'object';

    /**
     * Decapsulated object.
     *
     * @var object
     */
    private object $object;

    /**
     * Reflection for decapsulated object.
     *
     * @var \ReflectionClass
     */
    private \ReflectionClass $reflection;

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
     *
     * @return self
     *
     * @throws \InvalidArgumentException
     */
    public static function buildForObject(mixed $object): self
    {
        if (! self::objectIsValid($object)) {
            throw new \InvalidArgumentException('Argument is not an object.');
        }

        $decapsulator = self::createInstanceFromObject($object);

        return $decapsulator;
    }

    /**
     * Magically set object choosen property value.
     * Called when property is set directly by the property name.
     *
     * @param string $name
     *
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set(string $name, mixed $value): void
    {
        if (! $this->propertyExists($name)) {
            throw new \InvalidArgumentException("Property '{$name}' does not exist.");
        }

        $this->setProperty($name, $value);
    }

    /**
     * Magically get object choosen property value.
     * Called when property is get directly by the property name.
     *
     * @param string $name
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function __get(string $name): mixed
    {
        if (! $this->propertyExists($name)) {
            throw new \InvalidArgumentException("Property '{$name}' does not exist.");
        }

        $property = $this->getProperty($name);

        return $property;
    }

    /**
     * Magically call object choosen method.
     * Called when method is called directly by the method name.
     *
     * @param string $name
     * @param mixed[] $arguments
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function __call(string $name, array $arguments): mixed
    {
        if (! $this->methodExists($name)) {
            throw new \InvalidArgumentException("Method '{$name}' does not exist.");
        }

        $result = $this->callMethod($name, $arguments);

        return $result;
    }

    /**
     * Check object is valid instance of the class.
     *
     * @param mixed $object
     *
     * @return bool
     */
    private static function objectIsValid(mixed $object): bool
    {
        $objectType = gettype($object);
        $objectIsValid = ($objectType === self::VALID_OBJECT_TYPE);

        return $objectIsValid;
    }

    /**
     * Create ObjectDecapsulator instance wrapped given object.
     *
     * @param mixed $object
     *
     * @return ObjectDecapsulator
     */
    private static function createInstanceFromObject(mixed $object): ObjectDecapsulator
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
    private function setUpWithObject(mixed $object): void
    {
        $this->setObject($object);
        $this->setUpReflection();
    }

    /**
     * Set decapsulated object.
     *
     * @param mixed $object
     */
    private function setObject(mixed $object): void
    {
        $this->object = $object;
    }

    /**
     * Set-up reflection for decapsulated object.
     */
    private function setUpReflection(): void
    {
        $className = get_class($this->object);
        $this->reflection = new \ReflectionClass($className);
    }

    /**
     * Check object property with given name exists.
     *
     * @param string $name
     *
     * @return boolean
     *
     * @throws \UnexpectedValueException
     */
    private function propertyExists(string $name): bool
    {
        $className = get_class($this->object);
        $propertyExists = property_exists($className, $name);

        return $propertyExists;
    }

    /**
     * Check object method with given name exists.
     *
     * @param string $name
     *
     * @return boolean
     */
    private function methodExists(string $name): bool
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
    private function setProperty(string $name, mixed $value): void
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->object, $value);
    }

    /**
     * Get value of the given object property.
     *
     * @param string $name
     *
     * @return mixed
     */
    private function getProperty(string $name): mixed
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);
        $value = $property->getValue($this->object);

        return $value;
    }

    /**
     * Call given object method.
     *
     * @param string $name
     * @param array[mixed] $arguments
     *
     * @return mixed
     */
    private function callMethod(string $name, array $arguments = []): mixed
    {
        $method = $this->reflection->getMethod($name);
        $method->setAccessible(true);
        $result = $method->invokeArgs($this->object, $arguments);

        return $result;
    }
}
