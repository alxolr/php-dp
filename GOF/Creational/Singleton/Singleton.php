<?php

namespace DP\GOF\Creational\Singleton;

/**
 * Class Preferences
 */
class Preferences
{
    /**
     * @var Preferences
     */
    private static $instance;

    /**
     * @var array
     */
    private $properties = array();

    /**
     * Private constructor design implementation for the singleton
     */
    private function __construct() {}

    /**
     * @return Preferences
     */
    public function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }

        return self::$instance;
    }

    /**
     * @param $key
     *
     * @return mixed
     * @throws UnexpectedValueException
     */
    public function getProperties($key)
    {
        if (array_key_exists($key, $this->properties)) {
            return $this->properties[$key];
        } else {
            throw new UnexpectedValueException();
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public function setProperties($key, $value)
    {
        $this->properties[$key] = $value;
    }
}
