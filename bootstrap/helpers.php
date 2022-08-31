<?php

function format_carbon_date(\Carbon\Carbon $date): string
{
    return $date->format('d.m.Y.');
}

function format_carbon_time(\Carbon\Carbon $time): string
{
    return $time->format('d.m.Y. \u H:i');
}

function format_date(string $date): string
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y.');
}

function format_time(string $time): string
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->format('d.m.Y. \u H:i');
}

function format_activity_time(string $time): string
{
    if(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->isCurrentWeek()){
        return 'This '.\Carbon\Carbon::parse($time)->englishDayOfWeek.' at '.\Carbon\Carbon::parse($time)->format('H:i');
    }
    if(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->isLastWeek()){
        return 'Last '.\Carbon\Carbon::parse($time)->englishDayOfWeek.' at '.\Carbon\Carbon::parse($time)->format('H:i');
    }
    if(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->isLastYear()){
        return \Carbon\Carbon::parse($time)->format('M jS Y - H:i');
    }
    return \Carbon\Carbon::parse($time)->format('M jS H:i');

}
