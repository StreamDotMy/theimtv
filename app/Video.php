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
        'title', 'synopsis', 'description',
    ];
    
    
    /**
     * Get the user that owns the video.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
