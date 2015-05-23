<?php 
namespace jhgundersen\permutation;

class ArrayPermuter {

	private $array;

	public function __construct(array $array){
		$this->array = array_values($array);
	}

	public function walk(Callable $callback){
		$this->permute($this->array, $callback);
	}

	private function permute(array $items, Callable $callback, array $permutation = array()) {
	    $length = count($items);
	    
	    for ($i = 0; $i < $length; $i++) {
	        $remains = $items;
	        $next_permutation = $permutation;
	         
	        list($next_item) = array_splice($remains, $i, 1);
	        $next_permutation[] = $next_item;
	         
	        if(empty($remains)){
	         	$callback($next_permutation);
	        }
	        else {
	        	$this->permute($remains, $callback, $next_permutation);
	        }
	    }
	}
}