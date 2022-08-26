<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function librarian()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function end_reason()
    {
        return $this->belongsTo(ReservationEndReason::class, 'reservation_end_reason_id');
    }

    public function getSupposedEndTimeAttribute()
    {
        return Carbon::parse($this->start_time)->addDays(DB::table('settings')->where('variable', '=', 'Reservation time')->value('value'));
    }
}
