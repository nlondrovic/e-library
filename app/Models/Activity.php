<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['time'];
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function librarian()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'activity_id');
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'activity_id');
    }
}
