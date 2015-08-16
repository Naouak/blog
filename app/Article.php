<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'content', 'published_at'];
	protected $dates = ['published_at'];

	public function user() {
		return $this->hasOne('blog\User');
	}
}
