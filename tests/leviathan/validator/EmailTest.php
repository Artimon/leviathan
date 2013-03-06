<?php

class Leviathan_Validator_EmailTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider getDataForValidate
	 */
	public function testValidate($email, $expectedResult) {
		$sut = new Leviathan_Validator_Email($email);

		$this->assertEquals(
			$expectedResult,
			$sut->valid()
		);
	}

	public function getDataForValidate() {
		return array(
			array('heinz.peter@megadeath.net',	true),
			array('heinz.peter',				false)
		);
	}
}
