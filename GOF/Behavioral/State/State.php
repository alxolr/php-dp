<?php
namespace DP\GOF\Behavioral\State;

/**
 * Interface State
 */
interface State
{
    /**
     * @param $input
     *
     * @return mixed
     */
    public function parse($input);

    /**
     * @return mixed
     */
    public function valid();
}

/**
 * Class EvenOnesState
 */
class EvenOnesState implements State
{
    /**
     * @param $input
     *
     * @return $this|OddOnesState
     */
    public function parse($input)
    {
        if ($input == 1) {
            return new OddOnesState();
        } else {
            return $this;
        }
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return true;
    }
}

/**
 * Class OddOnesState
 */
class OddOnesState implements State
{
    /**
     * @param $input
     *
     * @return EvenOnesState
     */
    public function parse($input)
    {
        if ($input == 1) {
            return new EvenOnesState();
        }
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return false;
    }
}

/**
 * Class ParityBitValidator
 */
class ParityBitValidator
{
    /**
     * @var State
     */
    protected $state;

    /**
     * @param State $initialState
     */
    public function __construct(State $initialState)
    {
        $this->state = $initialState;
    }

    /**
     * @param $bits
     *
     * @return mixed
     */
    public function isValid($bits)
    {
        for ($i = 0; $i < strlen($bits); $i++) {
            $bit = $bits[$i];
            $this->state = $this->state->parse($bit);
        }

        return $this->state->valid();
    }
}


$validator = new ParityBitValidator(new EvenOnesState());
var_dump($validator->isValid('10101001101'));
var_dump($validator->isValid('101010011011'));
