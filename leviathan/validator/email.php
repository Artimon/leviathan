<?php

/**
 * Default validator implementation to validate email format.
 */
class Leviathan_Validator_Email extends Leviathan_Validator{
	/**
	 * @var string
	 */
	protected $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";

	/**
	 * @param int $minLen
	 * @param int $maxLen
	 * @return bool
	 */
	public function valid($minLen = 7, $maxLen = 64) {
		return $this->validate($minLen, $maxLen);
	}
}
