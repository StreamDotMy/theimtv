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
     *  Video belongsToMany Category
     */
    public function genres()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        //return $this->belongsToMany('App\GenreVideo', 'genre_video', 'video_id', 'genre_id');
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Genre', 'genre_videos', 'video_id', 'genre_id');
    }

    /**
     *  Video belongsToMany Category
     */
    public function categories()
    {
        //return $this->belongsToMany('App\VideoCategory');
        // Model | table_name | fk1 | fk2
        //return $this->belongsToMany('App\VideoCategory', 'category_video', 'video_id', 'category_id');
        return $this->belongsToMany('App\VideoCategory', 'category_video', 'video_id', 'category_id');
    }


}
