<?php
namespace DP\GOF\Behavioral\Command;

/**
 * The Command abstraction.
 * In this case the implementation must return a result,
 * sometimes it only has side effects.
 */
interface Validator
{
    /**
     * The method could have any parameters.
     * @param mixed
     * @return boolean
     */
    public function isValid($value);
}

/**
 * ConcreteCommand.
 */
class MoreThanZeroValidator implements Validator
{
    /**
     * @param $value
     * @return bool
     */
    public function isValid($value)
    {
        return $value > 0;
    }
}

/**
 * ConcreteCommand.
 */
class EvenValidator implements Validator
{
    /**
     * @param $value
     * @return bool
     */
    public function isValid($value)
    {
        return $value % 2 == 0;
    }
}

/**
 * The Invoker. An implementation could store more than one
 * Validator if needed.
 */
class ArrayProcessor
{
    /**
     * @var
     */
    protected $_rule;

    /**
     * @param Validator $rule
     */
    public function __construct(Validator $rule)
    {
        $this->_rule = $rule;
    }

    /**
     * @param array $numbers
     */
    public function process(array $numbers)
    {
        foreach ($numbers as $number) {
            if ($this->_rule->isValid($number)) {
                echo $number, "\n";
            }
        }
    }
}

//Client code
$processor = new ArrayProcessor(new EvenValidator());
$processor->process(array(1, 20, 18, 5, 0, 31, 42));
