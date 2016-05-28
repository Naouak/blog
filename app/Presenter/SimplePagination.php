<?php
/**
 * Created by PhpStorm.
 * User: Naouak
 * Date: 28/05/2016
 * Time: 18:54
 */

namespace blog\Presenter;


use Illuminate\Contracts\Pagination\Presenter;
use Illuminate\Pagination\Paginator;

class SimplePagination implements Presenter{
	/** @var Paginator */
	private $paginator;

	/**
	 * SimplePagination constructor.
	 */
	public function __construct(Paginator $paginator){
		$this->paginator = $paginator;
	}


	/**
	 * Render the given paginator.
	 *
	 * @return string
	 */
	public function render(){
		$render = "";
		if($this->paginator->currentPage() > 1){
			$render .= "<div class='pagination pagination-previous'><a href='".$this->paginator->previousPageUrl()."'> &lt;&lt; Page précédente </a></div>";
		}

		if($this->paginator->hasMorePages()){
			$render .= "<div class='pagination pagination-next'><a href='".$this->paginator->nextPageUrl()."'> Page suivante &gt;&gt; </a></div>";
		}

		return "<div class='pagination-container'>".$render."</div>";
	}

	/**
	 * Determine if the underlying paginator being presented has pages to show.
	 *
	 * @return bool
	 */
	public function hasPages(){
		return $this->paginator->hasPages();
	}
}