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
