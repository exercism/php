<?php

class PizzaPi
{
    public function calculateDoughRequirement($number_of_pizzas, $persons_per_pizza)
    {
        return floor($number_of_pizzas * (($persons_per_pizza * 20) + 200));
    }

    public function calculateSauceRequirement($number_of_pizzas, $volume_per_can)
    {
        return ceil($number_of_pizzas * 125 / $volume_per_can);
    }

    public function calculateCheeseCubeCoverage($side_dimension, $thickness, $pizza_diameter)
    {
        return floor(($side_dimension ** 3) / ($thickness * M_PI * $pizza_diameter));
    }

    public function calculateLeftOverSlices($number_of_pizzas, $number_of_friends)
    {
        return ($number_of_pizzas * 8) % $number_of_friends;
    }
}
