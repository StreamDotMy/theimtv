<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'synopsis', 'description', 'video_category_id',
    ];
    
    
    /**
     * Get the User that owns the video.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the VideoCategory that owns the video.
     */
    public function video_category()
    {
        return $this->belongsTo('App\VideoCategory');
    }    
}
