<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'prefix', 'description',
    ];

    /**
     * Videos owned by the VideoCategory.
     */
    //public function videos()
    //{
    //    return $this->belongsToMany('App\Video');
    //} 
    public function videos()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        return $this->belongsToMany('App\Video', 'category_video', 'category_id', 'video_id');
    }
}
