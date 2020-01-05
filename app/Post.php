<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    use Sluggable;
    
    protected $fillable = ['title','content','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function getRoutekeyName(){
    //     return 'title';
    // }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
