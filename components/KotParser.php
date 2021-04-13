<?php


namespace app\components;


class KotParser
{
    public static function get($url, $start, $end)
    {
        $num1 = strpos($url, $start);

        if($num1 === false) return 0;

        $num2 = substr($url, $num1);
        return strip_tags(substr($num2, 0, strpos($num2, $end)));

    }

}