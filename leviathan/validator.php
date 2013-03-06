<?php

/**
 * Provides a string validation interface.
 */
abstract class Leviathan_Validator {
	/**
	 * @var string
	 */
	protected $regex = '';

	/**
	 * @var string
	 */
	protected $expression = '';

	/**
	 * @param string $expression
	 */
	public function __construct($expression) {
		$this->expression = (string)$expression;
	}

	/**
	 * @param string $regex
	 * @return \Leviathan_Validator
	 */
	public function setRegex($regex) {
		$this->regex = (string)$regex;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getExpression() {
		return $this->expression;
	}

	/**
	 * Return is valid string.
	 *
	 * @param int $minLength
	 * @param int $maxLength
	 * @return bool true if valid
	 */
	protected function validate($minLength, $maxLength) {
		$regex		= Leviathan_Encoder::utf8encode($this->regex);
		$expression	= Leviathan_Encoder::utf8encode($this->expression);

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
