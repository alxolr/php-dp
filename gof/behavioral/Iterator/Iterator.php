<?php

/**
 * Interface AggregateInterface
 */
interface AggregateInterface
{
    /**
     * @return mixed
     */
    function createIterator();
}

/**
 * Interface IteratorInterface
 */
interface IteratorInterface
{
    /**
     * @return mixed
     */
    function first();

    /**
     * @return mixed
     */
    function next();

    /**
     * @return mixed
     */
    function isDone();

    /**
     * @return mixed
     */
    function currentItem();
}

/**
 * Class ConcreteAggregate
 */
class ConcreteAggregate implements AggregateInterface
{
    /**
     * @var array
     */
    private $exchange;
    /**
     * @var
     */
    private $iterator;

    /**
     * @param array $curr
     */
    public function __construct(array $curr)
    {
        $this->exchange = $curr;
        sort($this->exchange);
    }

    /**
     * @return ConcreteIterator
     */
    function createIterator()
    {
        $this->iterator = new ConcreteIterator($this->exchange);

        return $this->iterator;
    }
}

/**
 * Class ConcreteIterator
 */
class ConcreteIterator implements IteratorInterface
{
    /**
     * @var array
     */
    private $listNow = array();

    private $position;

    /**
     * @param array $sendList
     */
    public function __construct(array $sendList)
    {
        $this->listNow = $sendList;
    }

    function first()
    {
        $this->position = 0;
    }

    function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    function isDone()
    {
        return isset($this->listNow[$this->position]);
    }

    /**
     * @return mixed
     */
    function currentItem()
    {
        return $this->listNow[$this->position];
    }
}
