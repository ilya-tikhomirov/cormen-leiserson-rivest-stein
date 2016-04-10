<?php

/**
 * Quick sort with rand base element
 *
 * @param array $arr Array
 * @param int $left Left index
 * @param int|null $right Right index
 * @return void
 */
function quickSort(array &$arr, int $left = 0, $right = null)
{
    if (is_null($right)) {
        $right = count($arr) - 1;
    }

    if ($left < $right) {
        $q = partition($arr, $left, $right);
        quickSort($arr, $left, $q);
        quickSort($arr, $q + 1, $right);
    }
}

/**
 * Partition
 *
 * @param array $arr Array
 * @param int $left Left index
 * @param int $right Right index
 * @return int
 */
function partition(array &$arr, int $left, int $right) {
    $randIndex = rand($left, $right);

    $tmp = $arr[$randIndex];

    $arr[$randIndex] = $arr[$right];
    $arr[$right] = $tmp;

    $l = $left - 1;
    for ($i = $left; $i <= $right - 1; ++$i) {
        if ($arr[$i] <= $arr[$right]) {
            $l++;

            $tmp = $arr[$l];

            $arr[$l] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }

    $tmp = $arr[$right];
    $arr[$right] = $arr[$l + 1];
    $arr[$l + 1] = $tmp;

    return $l;
}

/**
 * Quick sort. Hoar partition
 *
 * @param array $arr Array
 * @param int $left Left index
 * @param int|null $right Right index
 */
function quickHoarSort(array &$arr, int $left = 0, $right = null)
{
    if (is_null($right)) {
        $right = count($arr) - 1;
    }

    $r = $right;
    $l = $left;

    $base = $arr[(int) ($l / 2 + $r / 2)];

    do {
        while ($arr[$l] < $base) {
            $l++;
        }

        while ($arr[$r] > $base) {
            $r--;
        }

        if ($l <= $r) {
            $tmp = $arr[$l];

            $arr[$l] = $arr[$r];
            $arr[$r] = $tmp;

            $l++;
            $r--;
        }
    } while ($l <= $r);

    if ($l <= $right) {
        quickSort($arr, $l, $right);
    }

    if ($r >= $left) {
        quickSort($arr, $left, $r);
    }
}