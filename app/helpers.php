<?php

use Illuminate\Support\Carbon;

function generateFileName($name)
{
    $year= Carbon::now()->year;
    $month= Carbon::now()->month;
    $day= Carbon::now()->day;
    $hour= Carbon::now()->hour;
    $second= Carbon::now()->second;

    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $second . '_' . $name;
}
