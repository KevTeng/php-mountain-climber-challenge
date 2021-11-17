<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        if($this->str == strrev($this->str)){
            return $this->str;
        }
        $rev = '';
        for ($i = strlen($this->str); $i > 0; $i-=1){
            $rev.= $this->str[$i - 1];
        }
        return $this->str . $rev;
    }
}
