<?php
namespace jhgundersen\permutation;

class ArrayPermuterSpec extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function should_be_able_to_call_function_for_each_permutation_of_a_array(){
		// given
		$variations = [];
		$array = new ArrayPermuter(range(1,2));
	
		// when
		$array->walk(function($variation) use (&$variations){
			$variations[] = $variation;
		});

		// then
		$this->assertEquals([
			[1, 2], 
			[2, 1]
		], $variations);
	}

	/**
	 * @test
	 */
	public function should_be_able_to_call_function_for_each_permutation_of_a_array2(){
		// given
		$variations = [];
		$array = new ArrayPermuter(['a', 'b', 'c']);
	
		// when
		$array->walk(function($variation) use (&$variations){
			$variations[] = $variation;
		});

		// then
		$this->assertEquals([
			['a', 'b', 'c'], 
			['a', 'c', 'b'],
			['b', 'a', 'c'],
			['b', 'c', 'a'],
			['c', 'a', 'b'],
			['c', 'b', 'a']
		], $variations);
	}

	/**
	 * @test
	 */
	public function should_ignore_keys_when_walking_an_associative_array(){
		// given
		$variations = [];
		$array = new ArrayPermuter(['a' => 1, 'b' => 2]);
	
		// when
		$array->walk(function($variation) use (&$variations){
			$variations[] = $variation;
		});

		// then
		$this->assertEquals([
			[1, 2], 
			[2, 1]
		], $variations);
	}
}