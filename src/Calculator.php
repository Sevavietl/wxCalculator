<?php

namespace Calculator;

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

    public function setResult($number)
    {
        $this->result = $number;
    }

    protected function add($number)
    {
        $result = $this->getResult() + $number;
        $this->setResult($result);
        return $result;
    }

    protected function subtract($number)
    {
        $result = $this->getResult() - $number;
        $this->setResult($result);
        return $result;
    }

    protected function multiply($number)
    {
        $result = $this->getResult() * $number;
        $this->setResult($result);
        return $result;
    }

    protected function divide($number)
    {
        if (0 === $number) {
            return 'Err';
        }

        $result = $this->getResult() / $number;
        $this->setResult($result);
        return $result;
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
            $this->action = $action;
            return $this->calculate();
        }

        $this->action = $action;
        return '';
    }

    public function setNumber($number)
    {
        if (isset($this->result)) {
            $this->number = $number;
        } else {
            $this->result = $number;
        }
    }

    public function calculate()
    {
        if (isset($this->number)) {
            if (method_exists($this, $this->action)) {
                return $this->{$this->action}($this->number);
            }
        }

        return 'Err';
    }
}
