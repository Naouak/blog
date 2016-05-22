<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'content', 'published', 'published_at', 'url'];
	protected $dates = ['published_at'];
	protected $appends = ["available","content_html","excerpt_html"];

	public function user() {
		return $this->hasOne('blog\User','id','user_id');
	}

	public function getContentHtmlAttribute(){
		return $this->content;
	}

	public function getExcerptHtmlAttribute(){
		return $this->excerpt;
	}

	public function getAvailableAttribute(){
		/** @var $this->published_at Carbon */
		return $this->published && $this->published_at->isPast();
	}

	public function newQuery() {
		return parent::newQuery()->orderBy('published_at', 'DESC');
	}

	public function scopePublished($query){
		return $query->where("published", 1)->whereRaw("published_at < NOW()");
	}

}
