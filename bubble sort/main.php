<?php

$array = [0,1,9,2,8,3,7,4,6,5];

$last = count($array) - 1;

$aux = null;

for ($i = 0; $i <= $last -1; $i++) {
    for ($j = $i + 1; $j <= $last; $j++) {
        if ($array[$i] > $array[$j]) {
            $aux = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $aux;
            $aux = null;
        }
    }
}

var_dump($array);