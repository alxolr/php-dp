<?php

/**
 * Class Preferences
 */
class Preferences
{
    private static $instance;

    /**
     * @var array
     */
    private $properties = array();

    /**
     *
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
     * @return mixed
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
