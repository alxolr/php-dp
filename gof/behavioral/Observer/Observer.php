<?php

function frand($min, $max, $decimals = 0) {
    $scale = pow(10, $decimals);
    return mt_rand($min * $scale, $max * $scale) / $scale;
}

interface Observer
{
    public function addCurrency(Currency $currency);
}

class PriceSimulator implements Observer
{
    private $currencies;

    public function __construct()
    {
        $this->currencies = array();
    }

    public function addCurrency(Currency $currency)
    {
        array_push($this->currencies, $currency);
    }

    public function updatePrice()
    {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}

interface Currency
{
    public function update();

    public function getPrice();
}

class Pound implements Currency
{
    private $price;

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
