<?php

/**
 * Insertion sort
 *
 * @param array $arr Array
 * @return void
 */
function insertSort(array &$arr)
{
    $count = count($arr);

    for ($i = 1; $i < $count; ++$i) {
        $val = $arr[$i];

        $j = $i - 1;
        while ($j > -1 && $val < $arr[$j]) {
            $arr[$j + 1] = $arr[$j];
            
            $j--;
        }

        $arr[$j + 1] = $val;
    }
}