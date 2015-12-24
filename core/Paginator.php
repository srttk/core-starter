<?php

class Paginator{


	protected $total;

	protected $per_page = 10;

	protected $number_of_pages;

	protected $first_page = 0;

	protected $last_page =0;

	protected $current_page;

	protected $next_page;

	protected $prev_page;

	protected $arrayPages = array();

	protected $num_links =10;


	



	public function process(){

		$this->calcPages();

		if($this->number_of_pages){
			for($i=1;$i<=$this->number_of_pages;$i++){


				$this->arrayPages[] = $i;
			}
		}
		

	}

	private function calcPages(){
		if( $this->total && $this->per_page ){
			$this->first_page = 1;
			$this->number_of_pages = ceil($this->total / $this->per_page);
			$this->last_page = $this->number_of_pages;
		}
	}

	public function setTotal($total=0){

		$this->total = $total;
		$this->process();
	}

	public function setCurrentPage($page){

		if(in_array($page, $arrayPages)){
			$this->current_page = $page;
		}
	}

	public function getPages(){
		return $this->number_of_pages;
	}

	public function getPageArray(){
		return $this->arrayPages;
	}

	public function render(){

	}

}