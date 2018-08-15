<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name', 'id'];



    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }

    public function getRouteKeyName()
    {
        return 'name';
    }



}
