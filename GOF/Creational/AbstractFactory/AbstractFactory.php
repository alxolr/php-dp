<?php

namespace DP\GOF\Creational\AbstractFactory;

/**
 * Class GUIFactory
 */
abstract class GUIFactory
{
    /**
     * @return Button
     */
    abstract function createButton();
}

/**
 * Class WinFactory
 */
class WinFactory extends GUIFactory
{
    /**
     * @return WinButton
     */
    function createButton()
    {
        return new WinButton();
    }
}

/**
 * Class OSXFactory
 */
class OSXFactory extends GUIFactory
{
    /**
     * @return OSXButton
     */
    function createButton()
    {
        return new OSXButton();
    }
}

/**
 * Class Button
 */
abstract class Button
{
    /**
     * @return mixed
     */
    abstract function paint();
}

/**
 * Class OSXButton
 */
class OSXButton extends Button
{
    /**
     * @return string
     */
    function paint()
    {
        return "OSX Button";
    }
}

/**
 * Class WinButton
 */
class WinButton extends Button
{
    /**
     * @return string
     */
    function paint()
    {
        return "Win Button";
    }
}

/**
 * Class Application
 */
class Application
{
    /**
     * @param GUIFactory $factory
     */
    public function __construct(GUIFactory $factory)
    {
        $button = $factory->createButton();
        $button->paint();
    }
}

/**
 * Class ApplicationRunner
 */
class ApplicationRunner
{
    public function run() {
        new Application($this->getOsSpecificFactory());
    }

    /**
     * @return GUIFactory
     */
    public function getOsSpecificFactory()
    {
        $flag = rand(0,1);
        if ($flag) {
            return new WinFactory();
        } else {
            return new OSXFactory();
        }
    }
}

$application = new ApplicationRunner();
$application->run();
