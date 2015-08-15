<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

	public function user() {
		return $this->hasOne('blog\User');
	}
}
