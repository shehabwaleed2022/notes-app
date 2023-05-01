<?php

namespace Core;

class Validator
{

    // This is pure function that is does not depend on any other variables outside it, so we can make it static
    public static function string($value, $min = 7, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
      return filter_var($value , FILTER_VALIDATE_EMAIL);
    }
}
