<?php

/**
 * Provides a string validation interface.
 */
abstract class Leviathan_Validator {
	/**
	 * Return is valid string.
	 *
	 * @param int $minLength
	 * @param int $maxLength
	 * @param string $regex
	 * @param string $expression
	 * @return bool true if valid
	 */
	protected function validate($minLength, $maxLength, $regex, $expression) {
		$regex		= Leviathan_Encoder::utf8encode($regex);
		$expression	= Leviathan_Encoder::utf8encode($expression);

		$length = strlen($expression);
		if ($maxLength < $length || $length < $minLength) {
			return false;
		}

		$matches = array();

		return (
			(preg_match($regex, $expression, $matches)) &&
			($matches[0] === $expression)
		);
	}
}
