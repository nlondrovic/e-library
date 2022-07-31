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
        return date("Y-m-d H:i:s", strtotime($this->start_time) + getenv('HOLDING_TIME') * 86400);
    }

    public function getHoldingTimeAttribute()
    {
        if($this->end_time)
            return Carbon::parse(strtotime($this->start_time))->diffInDays(Carbon::parse(strtotime($this->end_time))) . " days";

        return  Carbon::parse(strtotime($this->start_time))->diffInDays() . " days";
    }

    public function getOverdueTimeAttribute()
    {
        if($this->end_time)
            if($this->end_time > $this->supposed_end_time)
                return $this->overdue($this->end_time) . " days";
            else return "Not overdue";
        else
            if(now() > $this->supposed_end_time)
                return $this->overdue(now()) . " days";
            else return "Not overdue";
    }

    public function overdue($time)
    {
        return Carbon::parse(strtotime($this->supposed_end_time))->diffInDays($time);
    }
}
