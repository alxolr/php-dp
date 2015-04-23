<?php

/**
 * Class Memento
 */
class Memento
{
    /**
     * @var
     */
    private $mementoState;

    /**
     * @param Originator $originator
     */
    public function __construct(Originator $originator)
    {
        $this->setState($originator->state);
    }

    /**
     * @param $state
     */
    private function setState($state)
    {
        $this->mementoState = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->mementoState;
    }
}

/**
 * Class Originator
 */
class Originator
{
    /**
     * @var
     */
    public $state;

    /**
     * @return Memento
     */
    public function createMemento()
    {
        return (new Memento($this));
    }

    /**
     * @param Memento $cm
     */
    public function setMemento(Memento $cm)
    {
        $this->state = $cm->getState();
    }

    /**
     * @param $mementoState
     */
    public function setState($mementoState)
    {
        $this->state = $mementoState;
    }
}

/**
 * Class Caretaker
 */
class Caretaker
{
    /**
     * @var array
     */
    private $storage = array();

    /**
     * @param Memento $memento
     */
    public function addMemento(Memento $memento)
    {
        array_push($this->storage, $memento);
    }

    /**
     * @param $index
     * @return mixed
     */
    public function getMemento($index)
    {
        $stored = $this->storage[$index];
        return $stored;
    }
}

/**
 * Class Client
 */
class Client
{
    /**
     * @var Caretaker
     */
    private $ct;
    /**
     * @var Originator
     */
    private $orig;
    /**
     * @var string
     */
    private $first;
    /**
     * @var string
     */
    private $second;
    /**
     * @var string
     */
    private $element;

    /**
     *
     */
    public function __construct()
    {
        $this->element = 'restore';
        $this->first = 'first';
        $this->second = 'second';
        $this->ct = new Caretaker();
        $this->orig = new Originator();
        $this->orig->setState($this->first);
        $this->ct->addMemento($this->orig->createMemento());
        $this->orig->setState($this->second);
        $this->ct->addMemento($this->orig->createMemento());

        $this->orig->setMemento($this->ct->getMemento(1));
        echo $this->orig->state;
    }
}
