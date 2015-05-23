<?php
namespace jhgundersen\permutation;

class VietnameseSnake extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function should_be_able_to_solve_an_example_of_a_vietnamese_snake(){
		// given
		$array = new ArrayPermuter(range(1, 9));
		$answers = 0;

		// when
		$array->walk(function($n) use(&$answers){
			$answer = $n[0] + 13 * $n[1] / $n[2] + $n[3] + 12 * $n[4] - $n[5] - 11 + $n[6] * $n[7] / $n[8] - 10;
		         	
		 	if($answer == 66) $answers++;
		});

		// then
		$this->assertEquals(128, $answers);
	}
}