<?php

/*
  Write a listbox-style binary search for an ordered array of integers.
  Listbox-style means that you should return the index of
  the first item greater than or equal to the item being searched for;
  if all items are less, you should return the index of the last item.
  You are guaranteed that there is at least one item in the array.
 */
class Dichotomous
{
    public $haystack;
    public $needle;
    public $startIndex;
    public $endIndex;

    public function getHaystack()
    {
        return $this->haystack;
    }

    public function setHaystack($haystack)
    {
        $this->haystack = $haystack;
    }

    public function getNeedle()
    {
        return $this->needle;
    }

    public function setNeedle($needle)
    {
        $this->needle = $needle;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getEndIndex()
    {
        return $this->endIndex;
    }

    public function setEndIndex($endIndex)
    {
        $this->endIndex = $endIndex;
    }

    public function __construct($haystack, $needle)
    {
        $this->setHaystack($haystack);
        $this->setNeedle($needle);
        $this->setStartIndex(0);
        $this->setEndIndex(count($this->getHaystack()) - 1);
    }

    public function dichotomousSearch($haystack, $needle)
    {
        while ($this->getStartIndex() <= $this->getEndIndex()) {
            $middleIndex = ($this->getStartIndex() + $this->getEndIndex()) / 2;
            if ($needle > $haystack[$middleIndex]) {
                $this->setStartIndex($middleIndex + 1);
            } elseif ($needle < $haystack[$middleIndex]) {
                $this->setEndIndex($middleIndex - 1);
            } else {
                return $middleIndex;
            }
        }
    }

    public function search()
    {
        if ($this->getHaystack()[$this->getEndIndex()] <= $this->getNeedle()) {
            return $this->getEndIndex();
        }

        $index = $this->dichotomousSearch($this->getHaystack(), $this->getNeedle());

        if ($index) {
            return $index;
        }

        return $this->getStartIndex();
    }
}

$dichotomous = new Dichotomous([5, 6, 8, 9, 10, 11, 12], 7);
echo $dichotomous->search();
