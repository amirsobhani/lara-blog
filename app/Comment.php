<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user_id
 * @property mixed id
 */
class Comment extends Model
{
    protected $fillable=[
      'article_id',
        'user_id',
        'content'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
