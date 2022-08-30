<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
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

    public function end_reason()
    {
        return $this->belongsTo(CheckoutEndReason::class, 'checkout_end_reason_id');
    }

    public function getSupposedEndTime()
    {
        $holding_time = DB::table('settings')
            ->where('variable', 'Holding time')
            ->value('value');

        return Carbon::parse($this->start_time)->addDays($holding_time);
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
            return "<p class=\"font-medium\">{{ __('Less than 24 hours') }}</p>";

        // if checkout is overdue
        $holding_time = DB::table('settings')->where('variable', 'Holding time')->first()->value;
        if ($days >= $holding_time)
            return "<p class=\"text-center bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px] font-medium\">"
                . $days . " {{ __('days') }}</p>";

        return "<p class=\"font-medium\">$days {{ __('days') }}</p>";
    }

    public function getOverdueTime()
    {
        $class_list = "text-center rounded-[10px] px-[6px] py-[2px] text-[14px] font-medium";
        if ($this->end_time)
            if ($this->end_time > $this->getSupposedEndTime())
                return "<p class=\"$class_list bg-red-200 text-red-800\">" . $this->overdue($this->end_time) . " {{ __('days') }}</p>";
            else
                return "<p class=\"font-medium\">{{ __('Not overdue') }}</p>";

        if (now() > $this->getSupposedEndTime())
            return "<p class=\"$class_list bg-red-200 text-red-800\">" . $this->overdue() . " {{ __('days') }}</p>";
        else return "<p class=\"font-medium\">{{ __('Not overdue') }}</p>";
    }

    public function overdue($time = null)
    {
        return Carbon::parse(strtotime($this->getSupposedEndTime()))->diffInDays($time);
    }
}
