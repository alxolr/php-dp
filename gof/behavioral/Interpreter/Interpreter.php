<?php

/**
 * Class Expression
 */
abstract class Expression
{
    /**
     * @var int
     */
    private static $keyCount = 0;
    /**
     * @var
     */
    private $key;

    /**
     * @param InterpreterContext $context
     * @return mixed
     */
    abstract function interpret(InterpreterContext $context);

    /**
     * @return int
     */
    public function getKey()
    {
        if (!isset($this->key)) {
            self::$keyCount++;
            $this->key = self::$keyCount;
        }

        return $this->key;
    }
}

/**
 * Class InterpreterContext
 */
class InterpreterContext
{
    /**
     * @var array
     */
    private $expressionStore = array();

    /**
     * @param Expression $exp
     * @param $value
     */
    public function replace(Expression $exp, $value)
    {
        $this->expressionStore[$exp->getKey()] = $value;
    }

    /**
     * @param Expression $exp
     * @return mixed
     */
    public function lookup(Expression $exp)
    {
        return $this->expressionStore[$exp->getKey()];
    }
}

/**
 * Class LiteralExpression
 */
class LiteralExpression extends Expression
{
    /**
     * @var
     */
    private $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param InterpreterContext $context
     * @return mixed|void
     */
    public function interpret(InterpreterContext $context)
    {
        $context->replace($this, $this->value);
    }
}

/**
 * Class VariableExpressions
 */
class VariableExpressions extends Expression
{
    /**
     * @var
     */
    private $name;
    /**
     * @var null
     */
    private $val;

    /**
     * @param $name
     * @param null $val
     */
    public function __construct($name, $val = null)
    {
        $this->name = $name;
        $this->val = $val;
    }

    /**
     * @param InterpreterContext $context
     * @return mixed|void
     */
    function interpret(InterpreterContext $context)
    {
        if (!is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }

    /**
     * @param $value
     */
    function setValue($value)
    {
        $this->val = $value;
    }

    /**
     * @return mixed
     */
    function getKey()
    {
        return $this->name;
    }
}

/**
 * Class OperatorExpression
 */
abstract class OperatorExpression extends Expression
{
    protected $leftOperator;
    protected $rightOperator;

    /**
     * @param Expression $leftOperator
     * @param Expression $rightOperator
     */
    function __construct(Expression $leftOperator, Expression $rightOperator)
    {
        $this->leftOperator = $leftOperator;
        $this->rightOperator = $rightOperator;
    }

    /**
     * @param InterpreterContext $context
     * @return mixed|void
     */
    public function interpret(InterpreterContext $context)
    {
        $this->leftOperator->interpret($context);
        $this->rightOperator->interpret($context);
        $resultLeft = $context->lookup($this->leftOperator);
        $resultRight = $context->lookup($this->rightOperator);

        $this->doInterpret($this, $resultLeft, $resultRight);
    }

    /**
     * @param InterpreterContext $context
     * @param $resultLeft
     * @param $resultRight
     * @return mixed
     */
    protected abstract function doInterpret(InterpreterContext $context, $resultLeft, $resultRight);
}

/**
 * Class EqualsExpression
 */
class EqualsExpression extends OperatorExpression
{
    /**
     * @param InterpreterContext $context
     * @param $resultLeft
     * @param $resultRight
     * @return mixed
     */
    protected function doInterpret(InterpreterContext $context, $resultLeft, $resultRight)
    {
        $context->replace($this, $resultLeft == $resultRight);
    }
}

/**
 * Class BooleanAndExpression
 */
class BooleanAndExpression extends OperatorExpression
{
    /**
     * @param InterpreterContext $context
     * @param $resultLeft
     * @param $resultRight
     * @return mixed
     */
    protected function doInterpret(InterpreterContext $context, $resultLeft, $resultRight)
    {
        $context->replace($this, $resultLeft && $resultRight);
    }
}

/**
 * Class BooleanOrExpression
 */
class BooleanOrExpression extends OperatorExpression
{
    /**
     * @param InterpreterContext $context
     * @param $resultLeft
     * @param $resultRight
     * @return mixed
     */
    protected function doInterpret(InterpreterContext $context, $resultLeft, $resultRight)
    {
        $context->replace($this, $resultRight || $resultLeft);
    }
}

$context = new InterpreterContext();
$input = new VariableExpressions('input');
$statement = new BooleanOrExpression(
    new EqualsExpression($input, new LiteralExpression('four')),
    new EqualsExpression($input, new LiteralExpression('4'))
);

foreach (array('four', '4', '52') as $val) {
    $input->setValue($val);
    print "$val:\n";
    $statement->interpret($context);
    if ( $context->lookup( $statement ) ) {
        print "top marks\n\n";
    } else {
        print "dunce hat on\n\n";
    }
}
