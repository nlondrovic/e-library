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

    public function getSupposedEndTimeAttribute()
    {
        return Carbon::parse($this->start_time)->addDays(getenv('HOLDING_TIME'));
    }

    public function getHoldingTimeAttribute()
    {
        if ($this->end_time)
            return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))->diffInHours(Carbon::parse(strtotime($this->end_time))));
        return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))->diffInHours());
    }

    public function formatHoldingTime($hours)
    {
        if ($hours / 24 < 1) // if holding less than a day
            return $hours % 24 . " hours";

        if ($hours % 24 == 0) // if holding exactly R days
            return $hours / 24 . " days";

        // if holding more than 24 hours
        return round($hours / 24) . " days " . $hours % 24 . " hours";
    }

    public function getOverdueTimeAttribute()
    {
        if ($this->end_time)
            if ($this->end_time > $this->supposed_end_time)
                return
                    "<p class=\"text-center bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]\">"
                    . $this->overdue($this->end_time) . " days</p>";
            else return "<p class=\"text-center bg-green-200 text-green-800 rounded-[10px] px-[6px] py-[2px] text-[14px]\">Not overdue</p>";
        else
            if (now() > $this->supposed_end_time)
                return
                    "<p class=\"text-center bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]\">"
                    . $this->overdue($this->end_time) . " days</p>";
            else return "<p class=\"text-center bg-green-200 text-green-800 rounded-[10px] px-[6px] py-[2px] text-[14px]\">Not overdue</p>";
    }

    public function overdue($time)
    {
        return Carbon::parse(strtotime($this->supposed_end_time))->diffInDays($time);
    }
}
