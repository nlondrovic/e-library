<?php

use Illuminate\Support\Facades\Lang;

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
    $local_language = Lang::getLocale();
    $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time)->locale($local_language);

    if ($date->isCurrentWeek()) {
        return $date->dayName . ' ' . __('at') . ' ' . $date->format('H:i');
    }

    if ($date->isLastWeek()) {
        if ($date->dayName == "srijeda" || $date->dayName == "subota" || $date->dayName == "nedjelja") {
            return __('Last.a') . ' ' . $date->dayName . ' ' . __('at') . ' ' . $date->format('H:i');
        }
        return __('Last') . ' ' . $date->dayName . ' ' . __('at') . ' ' . $date->format('H:i');
    }

    if (!$date->isCurrentYear()) {
        return $date->translatedFormat('M jS Y - H:i');
    }

    return $date->format('M jS H:i');
}

function capitalize(string $time): string
{
    return \Illuminate\Support\Str::ucfirst($time);
}

function filtering(): bool
{
    return request()->get('type')
        || request()->get('book_ids') || request()->get('student_ids')
        || request()->get('checkout_librarian_ids') || request()->get('checkin_librarian_ids')
        || request()->get('start_time') || request()->get('end_time')

        || request()->get('start_date') || request()->get('end_date')
        || request()->get('librarian_id') || request()->get('student_id') || request()->get('book_id');

}

function getPictureFilePath(string $url): string
{
//    return '/public'.$url;
    return $url;
}
