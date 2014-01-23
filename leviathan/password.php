<?php

class Leviathan_Password {
	/**
	 * @param string $password
	 * @param string $salt
	 * @return string
	 */
	public static function crypt($password, $salt) {
		$hash = md5($password);
		$hash = crypt($hash, $salt);

		return $hash;
	}

	/**
	 * @param string $password
	 * @param string $salt
	 * @param string $hash
	 * @return bool
	 */
	public static function valid($password, $salt, $hash) {
		return (self::crypt($password, $salt) === $hash);
	}
}