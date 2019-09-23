<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the user that owns the video.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
