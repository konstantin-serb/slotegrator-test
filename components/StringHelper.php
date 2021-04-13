<?php
namespace app\components;

class StringHelper
{
    const LIMIT = 200;

    public static function getShort($string, $limit = null)
    {
        if ($limit === null) {
            $limit = self::LIMIT;
        }

        if(strlen($string) > $limit) {
            return mb_substr($string, 0, $limit, 'UTF-8') . '...';
        } else {
            return $string;
        }
    }

}