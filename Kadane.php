<?php

/*
  Suppose you have an array of integers, both positive and negative, in no particular order.
  Find the largest possible sum of any continuous subarray.
  For example, if you have all positive numbers, the largest sum would be the sum of the whole array;
  if you have all negative numbers, the largest sum is 0 (the null subarray).
 */
class Kadane
{
    public $haystack;

    public function getHaystack()
    {
        return $this->haystack;
    }

    public function setHaystack($haystack)
    {
        $this->haystack = $haystack;
    }

    public function __construct($haystack)
    {
        $this->setHaystack($haystack);
    }

    public function search()
    {
        $maxEndingHere = 0;
        $maxSoFar      = 0;

        for($i = 0; $i < count($this->getHaystack()); $i++) {
            $x             = $this->getHaystack()[$i];
            $maxEndingHere = max(0, $maxEndingHere + $x);
            $maxSoFar      = max($maxSoFar, $maxEndingHere);
        }

        return $maxSoFar;
    }
}

$kadane = new Kadane([1, -2, 3, -4, 5, 6, -7, -8, 9, -10]);
echo $kadane->search();


