<?php
namespace DP\GOF\Structural\Flyweight;

/**
 * Class Nationality
 */
class Nationality
{
    /**
     * @var
     */
    private $_nationName;

    /**
     * @param $nationName
     */
    public function __construct($nationName)
    {
        $this->_nationName = $nationName;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->_nationName;
    }

    /**
     * @param $person
     * @return string
     */
    public function getNationalityDeclaration($person)
    {
        return "{$person} is from {$this->_nationName}";
    }

    /**
     * @var array
     */
    private static $_instances = array();

    /**
     * @param $name
     * @return mixed
     */
    public static function getInstance($name)
    {
        if (!isset(self::$_instances[$name])) {
            self::$_instances[$name] = new self($name);
        }

        return self::$_instances[$name];
    }
}

/**
 * Class User
 */
class User
{
    /**
     * @var
     */
    private $_uid;
    /**
     * @var
     */
    private $_nation;

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->_uid;
    }

    /**
     * @param $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->_uid = $uid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->_nation;
    }

    /**
     * @param Nationality $nation
     * @return $this
     */
    public function setNationality(Nationality $nation)
    {
        $this->_nation = $nation;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "User: #{$this->_uid} . " . $this->_nation->getNationalityDeclaration($this->_uid);
    }
}

$user = new User();
$user->setUid(714673)
    ->setNationality(Nationality::getInstance('Italy'));

echo $user, "\n";

$user->setNationality(Nationality::getInstance('Australia'));
echo $user, "\n";
