<?php

namespace blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'content', 'published_at'];
	protected $dates = ['published_at'];
	protected $appends = ["available"];

	public function user() {
		return $this->hasOne('blog\User');
	}

	public function getAvailableAttribute(){
		/** @var $this->published_at Carbon */
		return $this->published && $this->published_at->isPast();
	}

	public function newQuery() {
		return parent::newQuery()->orderBy('published_at', 'DESC');
	}


}
