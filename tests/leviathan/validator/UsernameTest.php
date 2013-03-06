<?php

class Leviathan_Validator_UsernameTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider getDataForValidate
	 */
	public function testValidate($username, $expectedResult) {
		$sut = new Leviathan_Validator_Username($username);

		$this->assertEquals(
			$expectedResult,
			$sut->valid()
		);
	}

	public function getDataForValidate() {
		return array(
			array('username',			true),
			array('user_name',			true),
			array('us',					false),
			array('üsername',			false),
			array('user name',			false),
			array('1234567890123456',	false)
		);
	}
}
