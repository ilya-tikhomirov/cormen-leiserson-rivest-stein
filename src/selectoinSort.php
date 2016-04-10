<?php

/**
 * Selection sort (linear search)
 *
 * @param array $arr Array
 * @return void
 */
function selectionSort(array &$arr)
{
    $countArr = count($arr) - 1;
    $countVals = count($arr);

    for ($i = 0; $i < $countArr; ++$i) {
        $min = $i;

        for ($j = $i; $j < $countVals; ++$j) {
            if ($arr[$min] > $arr[$j]) {
                $min = $j;
            }
        }

        list($arr[$i], $arr[$min]) = [$arr[$min], $arr[$i]];
    }
}