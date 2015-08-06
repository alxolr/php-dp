<?php
namespace DP\GOF\Structural\Composite;

/**
 * Class Unit
 */
abstract class Unit
{
    /**
     * @return mixed
     */
    abstract function bombardStrength();

    /**
     * @param Unit $unit
     */
    abstract function addUnit(Unit $unit);

    /**
     * @param Unit $unit
     */
    abstract function removeUnit(Unit $unit);
}

/**
 * Class Archer
 */
class Archer extends Unit
{
    /**
     * @return int
     */
    function bombardStrength()
    {
        return 4;
    }

    /**
     * @param Unit $unit
     * @throws UnitException
     */
    function addUnit(Unit $unit)
    {
       throw new UnitException(get_class($this) . "is a leaf");
    }

    /**
     * @param Unit $unit
     * @throws UnitException
     */
    function removeUnit(Unit $unit)
    {
        throw new UnitException(get_class($this) . "is a leaf");
    }
}

/**
 * Class LaserCannon
 */
class LaserCannon extends Unit
{
    /**
     * @return int
     */
    function bombardStrength()
    {
        return 44;
    }

    /**
     * @param Unit $unit
     * @throws UnitException
     */
    function addUnit(Unit $unit)
    {
        throw new UnitException(get_class($this) . "is a leaf");
    }

    /**
     * @param Unit $unit
     * @throws UnitException
     */
    function removeUnit(Unit $unit)
    {
        throw new UnitException(get_class($this) . "is a leaf");
    }
}

/**
 * Class Army
 */
class Army
{
    /**
     * @var Unit[]
     */
    private $units = array();

    /**
     * @param Unit $unit
     */
    function addUnit(Unit $unit)
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $this->units[] = $unit;
    }

    /**
     * @param Unit $unit
     */
    function removeUnit(Unit $unit)
    {
        $this->units = array_udiff(
            $this->units,
            array($unit),
            function ($a, $b) {
                return ($a === $b) ? 0 : 1;
            }
        );
    }

    /**
     * @return int|mixed
     */
    function bombardStrength()
    {
        $totalStrength = 0;
        foreach ($this->units as $unit) {
            $totalStrength += $unit->bombardStrength();
        }

        return $totalStrength;
    }
}

/**
 * Class UnitException
 */
class UnitException extends Exception
{
}
