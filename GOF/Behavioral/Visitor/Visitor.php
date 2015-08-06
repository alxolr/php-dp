<?php

namespace DP\GOF\Behavioral\Visitor;

/**
 * Interface CarElementVisitor
 * @package Visitor
 */
/**
 * Interface CarElementVisitor
 * @package DP\GOF\Behavioral\Visitor
 */
interface CarElementVisitor
{
    /**
     * @param Wheel $wheel
     *
     * @return mixed
     */
    function visitWheel(Wheel $wheel);

    /**
     * @param Engine $engine
     *
     * @return mixed
     */
    function visitEngine(Engine $engine);

    /**
     * @param Body $body
     *
     * @return mixed
     */
    function visitBody(Body $body);

    /**
     * @param Car $car
     *
     * @return mixed
     */
    function visitCar(Car $car);
}

/**
 * Interface CarElement
 * @package Visitor
 */
interface CarElement
{
    /**
     * @param CarElementVisitor $visitor
     *
     * @return mixed
     */
    function accept(CarElementVisitor $visitor);
}

/**
 * Class Wheel
 * @package DP\GOF\Behavioral\Visitor
 */
class Wheel implements CarElement
{
    /**
     * @var
     */
    private $name;

    /**
     * @param $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param CarElementVisitor $visitor
     */
    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitWheel($this);
    }
}

/**
 * Class Engine
 * @package DP\GOF\Behavioral\Visitor
 */
class Engine implements CarElement
{
    /**
     * @param CarElementVisitor $visitor
     */
    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitEngine($this);
    }
}

/**
 * Class Body
 * @package DP\GOF\Behavioral\Visitor
 */
class Body implements CarElement
{
    /**
     * @param CarElementVisitor $visitor
     */
    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitBody($this);
    }
}

/**
 * Class Car
 * @package DP\GOF\Behavioral\Visitor
 */
class Car implements CarElement
{
    /**
     * @var CarElement[]
     */
    private $elements;

    function __construct()
    {
        $this->elements = array(
            new Wheel('front left'),
            new Wheel('front right'),
            new Wheel('back left'),
            new Wheel('back right'),
            new Body(),
            new Engine()
        );
    }

    /**
     * @param CarElementVisitor $visitor
     *
     * @return mixed
     */
    function accept(CarElementVisitor $visitor)
    {
        foreach ($this->elements as $element) {
            $element->accept($visitor);
        }

        $visitor->visitCar($this);
    }
}

/**
 * Class CarElementPrintVisitor
 * @package DP\GOF\Behavioral\Visitor
 */
class CarElementPrintVisitor implements CarElementVisitor
{
    /**
     * @param Wheel $wheel
     *
     * @return mixed
     */
    function visitWheel(Wheel $wheel)
    {
        echo "Visiting" + $wheel->getName() + "wheel" . PHP_EOL;
    }

    /**
     * @param Engine $engine
     *
     * @return mixed
     */
    function visitEngine(Engine $engine)
    {
        echo "Visiting Engine" . PHP_EOL;
    }

    /**
     * @param Body $body
     *
     * @return mixed
     */
    function visitBody(Body $body)
    {
        echo "Visiting Body" . PHP_EOL;
    }

    /**
     * @param Car $car
     *
     * @return mixed
     */
    function visitCar(Car $car)
    {
        echo "Visiting Car" . PHP_EOL;
    }
}

/**
 * Class CarElementDoVisitor
 *
 * @package DP\GOF\Behavioral\Visitor
 */
class CarElementDoVisitor implements CarElementVisitor
{
    /**
     * @param Wheel $wheel
     *
     * @return mixed
     */
    function visitWheel(Wheel $wheel)
    {
        echo "Kick my" + $wheel->getName() + "wheel" . PHP_EOL;
    }

    /**
     * @param Engine $engine
     *
     * @return mixed
     */
    function visitEngine(Engine $engine)
    {
        echo "Starting engine" . PHP_EOL;
    }

    /**
     * @param Body $body
     *
     * @return mixed
     */
    function visitBody(Body $body)
    {
        echo "Moving my body" . PHP_EOL;
    }

    /**
     * @param Car $car
     *
     * @return mixed
     */
    function visitCar(Car $car)
    {
        echo "Starting my car" . PHP_EOL;
    }
}


$car = new Car();
$car->accept(new CarElementPrintVisitor());
$car->accept(new CarElementDoVisitor());
