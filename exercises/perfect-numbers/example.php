<?php

function getClassification($number)
{
    if ($number <= 0){
         throw new InvalidArgumentException("You must supply a natural number (positive integer)");
    }
    var_dump($number);
    $sum = 0 ;
    for($i = 1 ; $i < $number ; $i++ ){
        if ($number % $i == 0){
            //var_dump($i);
            $sum += $i ;
        }
    }
    var_dump($sum);
    if ($sum == $number){
        return "perfect" ;
    }else if ($sum < $number){
        return "deficient" ;
    }else{
        return "abundant" ;
    }
}
