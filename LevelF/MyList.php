<?php

namespace Hackathon\LevelF;

include 'MyElement.php';

class MyList
{
    private $head = null;
    private $length = 0;

    // ajout début
    public function prepend($value)
    {
        $element = new MyElement($value, $this->head);
        $this->head = $element;
        ++$this->length;

        return $this;
    }

    // ajout fin
    public function append($value)
    {
        $element = new MyElement($value, null);
        if ($this->isEmpty()) {
            $this->head = $element;
        } else {
            $this->getTail()->setNext($element);
        }
        ++$this->length;

        return $this;
    }

    public function isEmpty()
    {
        return is_null($this->head);
    }

    // remove first = SHIFT
    public function shift()
    {
        if ($this->isEmpty()) {
            return;
        }
        $this->head = $this->head->getNext();
        --$this->length;

        return $this;
    }

    // remove last = pop
    public function pop()
    {
        if ($this->length < 2) {
            return $this->shift();
        }
        $e = $this->getHead();
        $preprevious = null;
        $previous = null;
        while (!is_null($e)) {
            $preprevious = $previous;
            $previous = $e;
            $e = $e->getNext();
        }
        $preprevious->setNext(null);
        --$this->length;

        return $this;
    }

    public function hasValue($value)
    {
        return !is_null($this->getFirstElementByValue($value));
    }

    private function getHead()
    {
        return $this->head;
    }

    private function getTail()
    {
        $e = $this->getHead();
        $tmp = null;
        while (!is_null($e)) {
            $tmp = $e;
            $e = $e->getNext();
        }

        return $tmp;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function printConsole()
    {
        $e = $this->getHead();
        while (!is_null($e)) {
            $e->printConsole();
            $e = $e->getNext();
        }

        return $this;
    }

    /**
     * @TODO
     * @param $value
     *@return null|Element
     */
    public function getFirstElementByValue($value)
    {
        for ($p = $this->getHead(); $p != null; $p = $p->getNext()) {
            if ($p->getValue() == $value) {
                return $p;
            }
        }
        return null;
    }
}
/*
$l = new MyList;
$l->append(1);
$l->append(2);
$l->append(3);
$l->append(4);
$l->append(5);
$l->printConsole();
if (!$l->hasValue(7)) {
    echo "NULL";
} else {
    echo "WORKS";
}
*/


?>