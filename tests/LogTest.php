<?php

class LogTest extends \PHPUnit\Framework\TestCase
{
	public function testSequenceIsArray() 
	{
		$sequence = new \App\Models\Sequence(1,30);

		$this->assertInternalType("array",$sequence->getSequence());
	}

	public function testRule1True()
	{
		$sequence = new \App\Models\Sequence(1,30);		

		$this->assertTrue($sequence->applyRule1_1(6));//Is multiple of 3
		$this->assertTrue($sequence->applyRule1_2(13));//Has 3 in it
	}

	public function testRule1False()
	{
		$sequence = new \App\Models\Sequence(1,20);		

		$this->assertFalse($sequence->applyRule1_1(7));//Is not multiple of 3
		$this->assertFalse($sequence->applyRule1_2(11));//Does not have 3 in it
	}

	public function testRule2True()
	{
		$sequence = new \App\Models\Sequence(1,20);		

		$this->assertTrue($sequence->applyRule2_1(10));//Is multiple of 5
		$this->assertTrue($sequence->applyRule2_2(54));//Has 5 in it
	}

	public function testRule2False()
	{
		$sequence = new \App\Models\Sequence(1,20);		

		$this->assertFalse($sequence->applyRule2_1(7));//Is not multiple of 5
		$this->assertFalse($sequence->applyRule2_2(11));//Does not have 5 in it
	}

	public function testRule3True()
	{
		$sequence = new \App\Models\Sequence(1,20);		

		$this->assertTrue($sequence->applyRule3(15));//Is multiple of 3 and 5
	}

	public function testRule3False()
	{
		$sequence = new \App\Models\Sequence(1,20);		

		$this->assertFalse($sequence->applyRule3(9));//Is multiple of 3 but not 5
		$this->assertFalse($sequence->applyRule3(10));//Is multiple of 5 but not 3
	}
}