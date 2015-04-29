<?php
interface State
{
    /**
     * @param $input
     * @return mixed
     */
    public function parse($input);
    public function valid();
}

class EvenOnesState implements State
{
    public function parse($input) {
        if ($input == 1) {
            return new OddOnesState();
        } else {
            return $this;
        }
    }

    public function valid()
    {
        return true;
    }
}

class OddOnesState implements State {
    public function parse($input) {
        if ($input == 1) {
            return new EvenOnesState();
        }
    }
    public function valid()
    {
        return false;
    }
}

class ParityBitValidator
{
    protected $state;

    public function __construct(State $initialState)
    {
        $this->state = $initialState;
    }

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
