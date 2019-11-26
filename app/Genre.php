<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'prefix', 'description',
    ];


    public function videos()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        return $this->belongsToMany('App\Video', 'genre_videos', 'genre_id', 'video_id');
    }
}
