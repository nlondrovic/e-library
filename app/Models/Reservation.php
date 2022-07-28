<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [''];
    public $timestamps = false;

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function book (){
        return $this->belongsTo(Book::class);
    }

    public function librarian (){
        return $this->belongsTo(User::class);
    }

    public function student (){
        return $this->belongsTo(User::class);
    }

    public function reservationEndReason (){
        return $this->belongsTo(ReservationEndReason::class);
    }

    public function getSupposedEndTimeAttribute()
    {
        return date("Y-m-d H:i:s", strtotime($this->start_time) + getenv('RESERVATION_TIME') * 86400);
    }
}
