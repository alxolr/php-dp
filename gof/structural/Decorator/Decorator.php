<?php

/**
 * Class Tile
 */
abstract class Tile
{
    /**
     * @return mixed
     */
    abstract function getWealthFactor();
}

/**
 * Class Plains
 */
class Plains extends Tile
{
    /**
     * @var int
     */
    private $wealthFactor = 2;

    /**
     * @return int
     */
    function getWealthFactor()
    {
        return $this->wealthFactor;
    }
}

/**
 * Class TileDecorator
 */
abstract class TileDecorator extends Tile
{
    /**
     * @var
     */
    protected $tile;

    /**
     * @param Tile $tile
     */
    function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}

/**
 * Class DiamondDecorator
 */
class DiamondDecorator extends TileDecorator
{
    /**
     * @return mixed
     */
    function getWealthFactor() {
        return $this->tile->getWealthFactor() + 2;
    }
}

/**
 * Class PollutionDecorator
 */
class PollutionDecorator extends TileDecorator
{
    /**
     * @return mixed
     */
    function getWealthFactor() {
        return $this->tile->getWealthFactor() - 4;
    }
}

$tile = new Plains();
echo $tile->getWealthFactor(); // 2

$tile = new DiamondDecorator(new Plains());
echo $tile->getWealthFactor(); // 4

$tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
echo $tile->getWealthFactor(); // 0
