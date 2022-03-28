<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistData extends Model
{
    use HasFactory;
    protected $table = "playlistdata";
    protected $primarykey = "id";
    protected $fillable = [
        'playlist_id',
        'music_id'];
}
