<?php

//菜单树形数组
function grading($arr)
{
    $newArr = [];
    foreach ($arr as $k => $v) {
        if ($v["pid"] === 0) {
            array_push($newArr, $v);
            unset($arr[$k]);
        } else if ($v["pid"] !== 0) {
            foreach ($newArr as $y => $z) {
                if ($z["id"] === $v["pid"]) {
                    $child[] = $v;
                    $newArr[$y]["child"] =  $child;
                    unset($arr[$k]);
                }
            }
        }

    }

    return $newArr;
}

