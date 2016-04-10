<?php

/**
 * Find max sub-array
 *
 * @param array $arr Array
 * @param int $low From index
 * @param int $high To index
 * @return array
 */
function findMaxSubArray(array &$arr, int $low, int $high)
{
    if ($low == $high) {
        $result = [
            $low,
            $high,
            $arr[$low],
        ];
    } else {
        $mid = (int) ($low / 2 + $high / 2);

        $left = findMaxSubArray($arr, $low, $mid);
        $right = findMaxSubArray($arr, $mid + 1, $high);

        $cross = findMaxCrossArray($arr, $low, $mid, $high);

        if ($left[2] >= $right[2] && $left[2] >= $cross[2]) {
            $result = $left;
        } elseif ($right[2] >= $left[2] && $right[2] >= $cross[2]) {
            $result = $right;
        } else {
            $result = $cross;
        }
    }

    return $result;
}

/**
 * Find max cross-sub-array
 *
 * @param array $arr Array
 * @param int $low From index
 * @param int $mid Middle index
 * @param int $high To index
 * @return array
 */
function findMaxCrossArray(array &$arr, int $low, int $mid, int $high)
{
    $lSum = 0;
    $l = $mid;

    $sum = 0;
    for ($i = $mid; $i >= $low; --$i) {
        $sum += $arr[$i];

        if ($sum > $lSum) {
            $lSum = $sum;
            $l = $i;
        }
    }

    $rSum = 0;
    $r = $mid + 1;

    $sum = 0;
    for ($i = $mid + 1; $i <= $high; ++$i) {
        $sum += $arr[$i];

        if ($sum > $rSum) {
            $rSum = $sum;
            $r = $i;
        }
    }

    return [
        $l,
        $r,
        $lSum + $rSum,
    ];
}