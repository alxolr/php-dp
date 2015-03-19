<?php

/**
 * Class Pizza
 */
class Pizza
{
    /**
     * @var string
     */
    private $dough = "";
    /**
     * @var string
     */
    private $sauce = "";
    /**
     * @var string
     */
    private $topping = "";

    /**
     * @param string $dough
     */
    public function setDough($dough)
    {
        $this->dough = $dough;
    }

    /**
     * @param string $sauce
     */
    public function setSauce($sauce)
    {
        $this->sauce = $sauce;
    }

    /**
     * @param string $topping
     */
    public function setTopping($topping)
    {
        $this->topping = $topping;
    }
}

/**
 * Class PizzaBuilder
 */
abstract class PizzaBuilder
{
    /**
     * @var Pizza
     */
    protected $pizza;

    /**
     * @return Pizza
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    public function createNewPizzaProduct()
    {
        $this->pizza = new Pizza();
    }

    public abstract function buildDough();

    public abstract function buildSauce();

    public abstract function buildTopping();
}

/**
 * Class HawaiianPizzaBuilder
 */
class HawaiianPizzaBuilder extends PizzaBuilder
{
    public function buildDough()
    {
        $this->pizza->setDough('cross');
    }

    public function buildSauce()
    {
        $this->pizza->setSauce('hot');
    }

    public function buildTopping()
    {
        $this->pizza->setTopping('peperoni+salami');
    }
}

/**
 * Class SpicyPizzaBuilder
 */
class SpicyPizzaBuilder extends PizzaBuilder
{
    public function buildDough()
    {
        $this->pizza->setDough('pan baked');
    }

    public function buildSauce()
    {
        $this->pizza->setSauce('mild');
    }

    public function buildTopping()
    {
        $this->pizza->setTopping('ham+pineapple');
    }
}

/**
 * Class Waiter
 */
class Waiter
{
    /** @var  PizzaBuilder */
    private $pizzaBuilder;

    /**
     * @param PizzaBuilder $pizzaBuilder
     */
    public function setPizzaBuilder(PizzaBuilder $pizzaBuilder)
    {
        $this->pizzaBuilder = $pizzaBuilder;
    }

    /**
     * @return Pizza
     */
    public function getPizza()
    {
        return $this->pizzaBuilder->getPizza();
    }

    public function constructPizza()
    {
        $this->pizzaBuilder->createNewPizzaProduct();
        $this->pizzaBuilder->buildDough();
        $this->pizzaBuilder->buildSauce();
        $this->pizzaBuilder->buildTopping();
    }
}

/**
 * Class BuilderExample
 */
class BuilderExample
{
    public function run()
    {
        $waiter = new Waiter();
        $hawaiianPizzaBuilder = new HawaiianPizzaBuilder();

        $waiter->setPizzaBuilder($hawaiianPizzaBuilder);
        $pizza = $waiter->getPizza();
    }
}

$application = new BuilderExample();
$application->run();
