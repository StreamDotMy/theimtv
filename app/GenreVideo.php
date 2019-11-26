<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreVideo extends Model
{

    //protected $table = 'genre_video';

    public function videos()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        return $this->belongsToMany('App\Video', 'genre_videos', 'genre_id', 'video_id');
    }
}
