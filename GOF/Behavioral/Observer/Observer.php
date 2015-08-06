<?php
namespace DP\GOF\Behavioral\Observer;

function frand($min, $max, $decimals = 0)
{
    $scale = pow(10, $decimals);

    return mt_rand($min * $scale, $max * $scale) / $scale;
}

/**
 * Interface Observer
 */
interface Observer
{
    /**
     * @param Currency $currency
     *
     * @return mixed
     */
    public function addCurrency(Currency $currency);
}

/**
 * Class PriceSimulator
 */
class PriceSimulator implements Observer
{
    private $currencies;

    public function __construct()
    {
        $this->currencies = array();
    }

    /**
     * @param Currency $currency
     *
     * @return mixed|void
     */
    public function addCurrency(Currency $currency)
    {
        array_push($this->currencies, $currency);
    }

    /**
     *
     */
    public function updatePrice()
    {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}

/**
 * Interface Currency
 */
interface Currency
{
    /**
     * @return mixed
     */
    public function update();

    /**
     * @return mixed
     */
    public function getPrice();
}

/**
 * Class Pound
 */
class Pound implements Currency
{
    private $price;

    /**
     * @param $price
     */
    public function __construct($price)
    {
        $this->price = $price;
        echo "<p>Pound Original Price: {$price}</p>";
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo "<p>Pound Updated Price : {$this->price}</p>";
    }

    public function getPrice()
    {
        return frand(0.65, 0.71, 2);
    }

}

/**
 * Class Yen
 */
class Yen implements Currency
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "<p>Yen Original Price : {$price}</p>";
    }

    public function update()
    {
        $this->price = $this->getPrice();
        echo "<p>Yen Updated Price : {$this->price}</p>";
    }

    public function getPrice()
    {
        return frand(120.52, 122.50, 2);
    }

}

$priceSimulator = new PriceSimulator();

$pound = new Pound(0.60);
$yen = new Yen(122);

$priceSimulator->addCurrency($pound);
$priceSimulator->addCurrency($yen);

echo "<hr />";
$priceSimulator->updatePrice();

echo "<hr />";
$priceSimulator->updatePrice();
