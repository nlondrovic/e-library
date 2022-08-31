<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const DEFAULT_USER_PICTURE_PATH = '/assets/img/user.jpg';
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function isLibrarian()
    {
        return $this->role_id == 2;
    }

    public function canCheckoutOrReserveMoreBooks()
    {
        $books_per_student = DB::table('settings')
            ->where('variable', 'Books per student')
            ->value('value');

        return $this->getBookCount() < $books_per_student;
    }

    public function getBookCount()
    {
        return count(Checkout::where('student_id', $this->id)
                ->where('end_time', null)
                ->get())
            + count(Reservation::where('student_id', $this->id)
                ->where('end_time', null)
                ->get());
    }

    public function getCheckedOutCount()
    {
        return count(Checkout::where('student_id', $this->id)
            ->where('end_time', null)
            ->get());
    }

    public function getOverdueCount()
    {
        $holding_time = DB::table('settings')
            ->where('variable',  'Holding time')
            ->value('value');

        return count(Checkout::where('student_id', $this->id)
            ->where('end_time', null)
            ->where('start_time', '<', Carbon::now()->subDays($holding_time)->toDateTimeString())
            ->get());
    }

    public function getReservationsCount()
    {
        return count(Reservation::where('student_id', $this->id)
            ->where('end_time', null)
            ->get());
    }

    public function canNotCheckoutBook($book_id)
    {
        return count($this
            ->hasMany(Checkout::class, 'student_id')
            ->where('end_time', null)
            ->where('book_id', $book_id)
            ->get());
    }

    public function canNotReserveBook($book_id)
    {
        return count($this
            ->hasMany(Reservation::class, 'student_id')
            ->where('end_time', null)
            ->where('book_id', $book_id)
            ->get());
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class, 'student_id')->where('end_time', null);
    }
}
