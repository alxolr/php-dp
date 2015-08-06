<?php
namespace DP\GOF\Behavioral\Template;

/**
 * Class BinaryOperation
 * @author Giorgio Sironi <http://www.gergio>
 */
abstract class BinaryOperation
{
    /**
     * These are three hooks defined, which should
     * provide the two numbers which the operation is
     * applied to and its business logic.
     */

    protected abstract function _getFirstNumber();
    protected abstract function _getSecondNumber();
    protected abstract function _operator($a, $b);

    /**
     * This is the Template Method.
     * It uses all the three hooks, but a typical
     * Template Method can coexist with other ones, and
     * share hooks with them.
     *
     * @return int
     */
    public function getOperationResult()
    {
        $a = $this->_getFirstNumber();
        $b = $this->_getSecondNumber();

        return $this->_operator($a, $b);
    }
}

class Sum extends BinaryOperation
{
    private  $_a;
    private  $_b;

    public function __construct($a = 0, $b = 0)
    {
        $this->_a = $a;
        $this->_b = $b;
    }

    /**
     * @inheritdoc
     */
    protected function _getFirstNumber()
    {
        return $this->_a;
    }

    protected function _getSecondNumber()
    {
        return $this->_b;
    }

    protected function _operator($a, $b)
    {
        return $a + $b;
    }
}

/**
 * A ConcreteClass.
 */
class NonNegativeSubtraction extends BinaryOperation
{
    private $_a;
    private $_b;

    public function __construct($a = 0, $b = 0)
    {
        $this->_a = $a;
        $this->_b = $b;
    }

    protected function _getFirstNumber()
    {
        return $this->_a;
    }

    protected function _getSecondNumber()
    {
        return min($this->_a, $this->_b);
    }

    protected function _operator($a, $b)
    {
        return $a - $b;
    }
}

$sum = new Sum(84, 56); //140
echo $sum->getOperationResult(), "\n";
$nonNegativeSubtraction = new NonNegativeSubtraction(9, 14); //0
echo $nonNegativeSubtraction->getOperationResult();
