<?php

/**
 * @param $file
 * @return array
 */
function getProductFileLines($file)
{
    return file($file);
}

/**
 * @param $line
 * @return mixed|string
 */
function getNameFromLine($line)
{
    if (preg_match("/.*-(.*)\s\d+/", $line, $array)) {
        return str_replace('_', ' ', $array[1]);
    }

    return '';
}

/**
 * @param $line
 * @return int
 */
function getIDFromLine($line)
{
    if (preg_match("/^(\d{1,3})-/", $line, $array)) {
        return $array[1];
    }

    return -1;
}


/**
 * @param $id
 * @param $productname
 * @return Product
 */
function getProductObjectFromId($id, $productname)
{
// some kind of database lookup
    return new Product($id, $productname);
}


/**
 * Class Product
 */
class Product
{
    public $id;
    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

/**
 * Class ProductFacade
 */
class ProductFacade
{
    /**
     * @var array
     */
    private $products = array();
    /**
     * @var
     */
    private $file;

    /**
     * @param $file
     */
    function __construct($file)
    {
        $this->file = $file;
        $this->compile();
    }

    /**
     *
     */
    private function compile()
    {
        $lines = getProductFileLines($this->file);
        foreach ($lines as $line) {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $this->products[$id] = getProductObjectFromID($id, $name);
        }
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param $id
     * @return null
     */
    public function getProduct($id)
    {
        if (isset($this->products[$id])) {
            return $this->products[$id];
        }

        return null;
    }
}


