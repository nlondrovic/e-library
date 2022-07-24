<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

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
}
