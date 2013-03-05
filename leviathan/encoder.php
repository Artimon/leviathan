<?php

/**
 * Handles string encoding conversions.
 */
class Leviathan_Encoder {
	/**
	 * Encode strings to utf8.
	 */
	public static function utf8encode($string) {
		if (mb_check_encoding($string, 'UTF-8')) {
			return $string;
		}

		return utf8_encode($string);
	}

	/**
	 * Encode strings to utf8.
	 */
	public static function utf8decode($string) {
		if (mb_check_encoding($string, 'UTF-8')) {
			return utf8_decode($string);
		}

		return $string;
	}
}