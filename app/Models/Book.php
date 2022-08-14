<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const DEFAULT_BOOK_PICTURE_PATH = '/assets/img/book.jpg';
    protected $guarded = [''];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function script(){
        return $this->belongsTo(Script::class);
    }

    public function binding(){
        return $this->belongsTo(Binding::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function getOverdueCountAttribute()
    {
        $overdue_count = count(Checkout:: where('start_time', '<', Carbon::now()->subDays(20)->toDateTimeString())
            ->where('end_time', null)
            ->get());

        return $overdue_count;
    }

    public function getAvailableCountAttribute()
    {
        return $this->total_count - ($this->checkouts_count + $this->reserved_count);
    }
}
