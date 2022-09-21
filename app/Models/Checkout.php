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
            return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))
                ->diffInDays(Carbon::parse(strtotime($this->end_time))));
        return $this->formatHoldingTime(Carbon::parse(strtotime($this->start_time))->diffInDays());
    }

    public function formatHoldingTime($days)
    {
        // if holding less than a day
        if ($days < 1)
            return __('Less than 24 hours');

        // if checkout is overdue
        $holding_time = DB::table('settings')->where('variable', 'Holding time')->first()->value;
        if ($days >= $holding_time)
            return "$days " . __('days');

        // if not overdue and more than 24 hours
        return "$days " . __('days');
    }

    public function getOverdueTime()
    {
        if ($this->end_time)
            if ($this->end_time > $this->getSupposedEndTime())
                return $this->overdue($this->end_time) . " " . __('days');
            else
                return __('Not overdue');

        if (now() > $this->getSupposedEndTime())
            return $this->overdue() . " " . __('days');
        else return __('Not overdue');
    }

    public function overdue($time = null)
    {
        return Carbon::parse(strtotime($this->getSupposedEndTime()))->diffInDays($time);
    }
    public function isCheckout()
    {
        return $this->checkout_end_reason_id==null;
    }
    public function isCheckin()
    {
        return $this->checkout_end_reason_id==1;
    }
    public function isLost()
    {
        return $this->checkout_end_reason_id==2;
    }
}
