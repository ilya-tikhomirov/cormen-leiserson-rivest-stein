<?php

/**
 * Classic merge sort
 *
 * @param array $arr Array
 * @param int $l Left index
 * @param int|null $r Right index
 * @return void
 */
function mSort(array &$arr, int $l = 0, int $r = null)
{
    $r = is_null($r)
        ? count($arr) - 1
        : $r;

    if ($l < $r) {
        $c = (int) (($l + $r) / 2);

        mSort($arr, $l, $c);
        mSort($arr, $c + 1, $r);

        merge($arr, $l, $c, $r);
    }
}

/**
 * Merge 2 parts
 *
 * @param array $arr Array
 * @param int $l Left index
 * @param int $c Central (middle) index
 * @param int $r Right index
 * @return void
 */
function merge(array &$arr, int $l, int $c, int $r)
{
    $lCount = $c - $l + 1;
    $rCount = $r - $c;

    $lArr = [];
    for ($i = 0; $i < $lCount; ++$i) {
        $lArr[] = $arr[$l + $i];
    }

    $rArr = [];
    for ($i = 1; $i <= $rCount; ++$i) {
        $rArr[] = $arr[$c + $i];
    }

    $lArr[] = 100500;
    $rArr[] = 100500;

    $i = 0;
    $j = 0;
    for ($k = $l; $k <= $r; ++$k) {
        if ($lArr[$i] <= $rArr[$j]) {
            $arr[$k] = $lArr[$i];
            $i++;
        } else {
            $arr[$k] = $rArr[$j];
            $j++;
        }
    }
}