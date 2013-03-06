<?php

/**
 * Default validator implementation to validate email format.
 */
class Leviathan_Validator_Username extends Leviathan_Validator{
	/**
	 * @var string
	 */
	protected $regex = "/^[a-z0-9_-]+$/i";

	/**
	 * @param int $minLen
	 * @param int $maxLen
	 * @return bool
	 */
	public function valid($minLen = 3, $maxLen = 15) {
		return $this->validate($minLen, $maxLen);
	}
}
