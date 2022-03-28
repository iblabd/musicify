<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = "musics";
    protected $primarykey = "id";
    protected $fillable = [
        'title',
        'artist',
        'url_music',
        'url_image',
        'lyric'];
}