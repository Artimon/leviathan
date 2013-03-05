<?php

class Leviathan_Email extends Leviathan_Validator{
	/**
	 * @const string
	 */
	const REGEX = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";

	/**
	 * @var string
	 */
	private $email;

	/**
	 * @param string $email
	 */
	public function __construct($email) {
		$this->email = (string)$email;
	}

	/**
	 * @param int $minLen
	 * @param int $maxLen
	 * @return bool
	 */
	public function valid($minLen = 7, $maxLen = 64) {
		return $this->validate($minLen, $maxLen, self::REGEX, $this->email);
	}
}
