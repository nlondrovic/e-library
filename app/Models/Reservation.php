<?php

namespace App\Models;

use Carbon\Carbon;
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
          return Carbon::parse($this->start_time)->addDays(getenv('RESERVATION_TIME'));
    }
}
