<?php

namespace Visitor;

interface CarElementVisitor
{
    function visitWheel(Wheel $wheel);

    function visitEngine(Engine $engine);

    function visitBody(Body $body);

    function visitCar(Car $car);
}

interface CarElement
{
    function accept(CarElementVisitor $visitor);
}

class Wheel implements CarElement
{
    private $name;

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

    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitWheel($this);
    }
}

class Engine implements CarElement
{
    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitEngine($this);
    }
}

class Body implements CarElement
{
    function accept(CarElementVisitor $visitor)
    {
        $visitor->visitBody($this);
    }
}

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

    function accept(CarElementVisitor $visitor)
    {
        foreach ($this->elements as $element) {
            $element->accept($visitor);
        }

        $visitor->visitCar($this);
    }
}

class CarElementPrintVisitor implements CarElementVisitor
{
    function visitWheel(Wheel $wheel)
    {
        echo "Visiting" + $wheel->getName() + "wheel" . PHP_EOL;
    }

    function visitEngine(Engine $engine)
    {
        echo "Visiting Engine" . PHP_EOL;
    }

    function visitBody(Body $body)
    {
        echo "Visiting Body" . PHP_EOL;
    }

    function visitCar(Car $car)
    {
        echo "Visiting Car". PHP_EOL;
    }
}

class CarElementDoVisitor implements CarElementVisitor
{
    function visitWheel(Wheel $wheel)
    {
        echo "Kick my" + $wheel->getName() + "wheel" . PHP_EOL;
    }

    function visitEngine(Engine $engine)
    {
        echo "Starting engine" . PHP_EOL;
    }

    function visitBody(Body $body)
    {
        echo "Moving my body" . PHP_EOL;
    }

    function visitCar(Car $car)
    {
        echo "Starting my car" . PHP_EOL;
    }
}


$car = new Car();
$car->accept(new CarElementPrintVisitor());
$car->accept(new CarElementDoVisitor());
