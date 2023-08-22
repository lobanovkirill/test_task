<?php

class DateTimeHelper
{
    public function reformatTime($date)
    {
        $result = explode("T", $date);
        return $result[0] . " " . $result[1] . ":00";
    }

    public function ru_RU_TimeFormat($date)
    {
        $format = "d.m.Y";
        $dateTime = new DateTime($date);
        return $dateTime->format($format);
    }

    public function plusDays($date_start, $plusDays)
    {
        $format = "Y-m-d H:i:s";
        $dateTime = new DateTime($date_start);
        $dateTime->modify("+" . $plusDays . " day");
        return $dateTime->format($format);
    }

    public function compareDates($start_date, $date_finish)
    {
        $dateTimeOne = strtotime($start_date);
        $dateTimeTwo = strtotime($date_finish);
        if ($dateTimeOne > $dateTimeTwo)
            return true;
        else
            return false;
    }
}
