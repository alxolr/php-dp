<?php

/**
 * Class Sea
 */
class Sea
{
}

/**
 * Class EarthSea
 */
class EarthSea extends Sea
{
}

/**
 * Class MarsSea
 */
class MarsSea extends Sea
{
}

/**
 * Class Plains
 */
class Plains
{
}

/**
 * Class EarthPlains
 */
class EarthPlains extends Plains
{
}

/**
 * Class MarsPlains
 */
class MarsPlains extends Plains
{
}

/**
 * Class Forest
 */
class Forest
{
}

/**
 * Class EarthForest
 */
class EarthForest extends Forest
{
}

/**
 * Class MarsForest
 */
class MarsForest extends Forest
{
}

/**
 * Class TerrainFactory
 */
class TerrainFactory
{
    /**
     * @var Sea
     */
    private $sea;
    /**
     * @var Forest
     */
    private $forest;
    /**
     * @var Plains
     */
    private $plains;

    /**
     * @param Sea $sea
     * @param Plains $plains
     * @param Forest $forest
     */
    public function __construct(Sea $sea, Plains $plains, Forest $forest)
    {
        $this->sea = $sea;
        $this->forest = $forest;
        $this->plains = $plains;
    }

    /**
     * @return Sea
     */
    public function getSea()
    {
        return clone $this->sea;
    }

    /**
     * @return Plains
     */
    public function getPlains()
    {
        return clone $this->plains;
    }

    /**
     * @return Forest
     */
    public function getForest()
    {
        return clone $this->forest;
    }
}

$factory = new TerrainFactory(new EarthSea(), new EarthPlains(), new EarthForest());

$factory->getSea();
$factory->getForest();
$factory->getPlains();
