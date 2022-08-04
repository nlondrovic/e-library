<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function checkout_librarian()
    {
        return $this->belongsTo(User::class);
    }

    public function checkin_librarian()
    {
        return $this->belongsTo(User::class);
    }

    public function getSupposedEndTime()
    {
        return Carbon::parse($this->start_time)->addDays(getenv('HOLDING_TIME'));
    }

    public function getHoldingTime()
    {
        if ($this->end_time)
            return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))->diffInDays(Carbon::parse(strtotime($this->end_time))));
        return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))->diffInDays());
    }

    public function formatHoldingTime($days)
    {
        // if holding less than a day
        if ($days < 1)
            return "<p class=\"font-medium\">Less than 24 horus</p>";

        // if checkout is overdue
        if ($days >= getenv('HOLDING_TIME'))
            return "<p class=\"text-center bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px] font-medium\">"
                . $days . " days</p>";

        return "<p class=\"font-medium\">$days days</p>";
    }

    public function getOverdueTime()
    {
        $class_list = "text-center rounded-[10px] px-[6px] py-[2px] text-[14px] font-medium";
        if ($this->end_time)
            if ($this->end_time > $this->getSupposedEndTime())
                return "<p class=\"$class_list bg-red-200 text-red-800\">" . $this->overdue($this->end_time) . " days</p>";
            else
                return "<p class=\"font-medium\">Not overdue</p>";

        if (now() > $this->getSupposedEndTime())
            return "<p class=\"$class_list bg-red-200 text-red-800\">" . $this->overdue() . " days</p>";
        else return "<p class=\"font-medium\">Not overdue</p>";
    }

    public function overdue($time = null)
    {
        return Carbon::parse(strtotime($this->getSupposedEndTime()))->diffInDays($time);
    }
}
