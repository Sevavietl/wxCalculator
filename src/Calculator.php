<?php

namespace Calculator

class Calculator
{
    /**
     * Contains result of the calculations
     * @var number
     */
    private $result;

    /**
     * Calculator action, i.e. "add", "multiply"
     * @var string
     */
    private $action;

    /**
     * Currents number
     * @var number
     */
    private $number;

    /**
     * Result getter
     *
     * @return number
     */
    public function getResult()
    {
        if (isset($this->result)) {
            return $this->result;
        } else {
            return 0;
        }
    }

    protected function add($number)
    {
        $this->getResult += $number;
    }

    protected function subtract($number)
    {
        $this->getResult -= $number;
    }

    protected function multiply($number)
    {
        $this->getResult *= $number;
    }

    protected function divide($number)
    {
        $this->getResult /= $number;
    }

    public function resetResult()
    {
        unset($this->result);
    }

    public function resetAction()
    {
        unset($this->action);
    }

    public function resetNumber()
    {
        unset($this->number);
    }

    public function setAction($action)
    {
        if (isset($this->action)) {
            $this->calculate($action);
        }

        $this->action = $action;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    protected function calculate($action)
    {
        if (isset($this->number)) {
            if (method_exists($this, $action)) {
                $this->$action($this->number)
            }

            return;
        }

        throw new ErrException();
    }
}
