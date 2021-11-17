<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        $tmptab = $this->wallet;
        $tmptot = 0;
        while ($price > 0){
            $max = 0;
            $pos = 0;
            $bool = false;
            for($i = 0; $i < count($this->wallet); $i++){
                if (is_numeric($this->wallet[$i]) and $max < $this->wallet[$i] and $this->wallet[$i] <= $price) 
                {
                    $max = $this->wallet[$i];
                    $pos = $i;
                    $bool = true;
                }
            }
            if ($bool){
                $price -= $max;
                $tmptot += $max;
                //for($i = 0; $i < count)
                array_splice($this->wallet, $pos, 1);
            }
            else {
                break;
            }
        }
        if ($price <= 0){
            $this->total -= $tmptot;
            return true;
        }
        $this->wallet = $tmptab;
        return false;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
