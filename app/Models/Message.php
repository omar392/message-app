<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Message extends Model
{
    use HasFactory;
    use Favoriteable;
    protected $fillable = ['title_ar','title_en','message_ar','message_en','status'];
}
