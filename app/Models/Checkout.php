<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = [];
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

    public function overdue($time)
    {
        return Carbon::parse(strtotime($this->supposed_end_time))->diffInDays($time);
    }
    // TODO: Implementiraj holdingFor metodu, kako ne bi to radio u blade
}
