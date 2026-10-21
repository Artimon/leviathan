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

		return mb_convert_encoding($string, 'UTF-8', 'ISO-8859-1');
	}

	/**
	 * Encode strings to utf8.
	 */
	public static function utf8decode($string) {
		if (mb_check_encoding($string, 'UTF-8')) {
			return mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8');
		}

		return $string;
	}
}