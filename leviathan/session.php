<?php

/**
 * Session value retrieval/storage.
 */
class Leviathan_Session extends Leviathan_GlobalsAbstract {
	private static $instance;

	/**
	 * @return Leviathan_Session
	 */
	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * @param $index
	 * @param string|int|float|null $default
	 * @return string|int|float|null
	 */
	public function value($index, $default = null) {
		return $this->fromSource($_SESSION, $index, $default);
	}

	/**
	 * @param string|int|float $index
	 * @param string|int|float $value
	 * @return Leviathan_Session
	 */
	public function store($index, $value) {
		$this->toSource($_SESSION, $index, $value);

		return $this;
	}

	/**
	 * @return Leviathan_Session
	 */
	public function reset() {
		$_SESSION = array();

		return $this;
	}
}