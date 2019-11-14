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
        'ordering', 
        'title', 
        'synopsis', 
        'description', 
        'video_category_id',
        'genre',
        'casts',
        'director',
        'duration',
        'classification',
        'year_of_release',
        'start_date',
        'end_date'
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
   // public function video_category()
   // {
   //     return $this->belongsTo('App\VideoCategory');
   // }    

    /**
     *  Video belongsToMany Category
     */
    public function categories()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        return $this->belongsToMany('App\VideoCategory', 'category_video', 'video_id', 'category_id');
    }
}
