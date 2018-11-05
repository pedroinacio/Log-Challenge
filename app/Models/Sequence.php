<?php

namespace App\Models;

class Sequence
{
	public $sequence;

	public $first;
	public $last;

	public function __construct($first,$last)
	{
		$this->first = $first;
		$this->last = $last;

		for ($i=$first; $i <= ($last); $i++) { 
			$this->sequence[] = $i;
		}
	}

	public function getSequence() 
	{
		return $this->sequence;
	}

	public function applyRule1_1($number)
	{
		if((($number%3) == 0))
		{
			return true;
		}else{
			return false;
		}
	}

	public function applyRule1_2($number)
	{
		if((strpos((string)$number, '3') !== false))
		{
			return true;
		}else{
			return false;
		}
	}

	public function applyRule2_1($number)
	{
		if(($number%5 == 0))
		{
			return true;
		}else{
			return false;
		}		
	}

	public function applyRule2_2($number)
	{
		if((strpos((string)$number, '5') !== false))
		{
			return true;
		}else{
			return false;
		}
	}

	public function applyRule3($number)
	{
		if(($number%3 == 0) && ($number%5 == 0))
		{
			return true;
		}else{
			return false;
		}
	}

	public function applyRulesToSequence()
	{		
		for($i = 0; $i < sizeof($this->sequence); $i++){
			switch (true) {
				case ((
					//If Rule 3 is true, aren't Rule 1 and Rule 2 also true...?  ¯\_(ツ)_/¯
					$this->applyRule1_1($this->sequence[$i]) || 
					$this->applyRule1_2($this->sequence[$i]) || 
					$this->applyRule2_1($this->sequence[$i]) ||
					$this->applyRule2_2($this->sequence[$i])
					) && $this->applyRule3($this->sequence[$i])):

					$this->sequence[$i] = 'lucky';
					break;
				case (
					$this->applyRule1_1($this->sequence[$i]) && $this->applyRule1_2($this->sequence[$i]) && 
					$this->applyRule2_1($this->sequence[$i]) && $this->applyRule2_2($this->sequence[$i])
					):

					$this->sequence[$i] = 'fizzbuzz';
					break;
				case ($this->applyRule1_1($this->sequence[$i]) && $this->applyRule1_2($this->sequence[$i])):
					$this->sequence[$i] = 'fizz fizz';
					break;
				case ($this->applyRule2_1($this->sequence[$i]) && $this->applyRule2_2($this->sequence[$i])):
					$this->sequence[$i] = 'buzz buzz';
					break;
				case ($this->applyRule1_1($this->sequence[$i]) || $this->applyRule1_2($this->sequence[$i])):
					$this->sequence[$i] = 'fizz';
					break;
				case ($this->applyRule2_1($this->sequence[$i]) || $this->applyRule2_2($this->sequence[$i])):
					$this->sequence[$i] = 'buzz';
					break;
				default:					
					break;
			}
		}

		echo implode(',', $this->sequence);
	}
}