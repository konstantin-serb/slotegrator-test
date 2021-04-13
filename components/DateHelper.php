<?php

namespace app\components;

use Exception;

class DateHelper
{
    public static function getDate($stamp)
    {
        $strTime = $stamp;

        $_monthsList = array(".01." => "января", ".02." => "февраля",
            ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
            ".07." => "июля", ".08." => "августа", ".09." => "сентября",
            ".10." => "октября", ".11." => "ноября", ".12." => "декабря");

        $data = date('d', $strTime) . ' ' . $_monthsList[date('.m.', $strTime)]
            . ' ' . date('Y', $strTime) . 'г.';

        return $data;
    }


    public static function getTime($stamp)
    {
        $strTime = $stamp;

        $data = date('H', $strTime) . ':' . date('i', $strTime). ':' .date('s', $strTime);

        return $data;
    }


}


