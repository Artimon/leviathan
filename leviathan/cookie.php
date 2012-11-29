<?php

/**
 * Cookie value retrieval/storage.
 */
class Leviathan_Cookie extends Leviathan_GlobalsAbstract {
	/**
	 * @param $index
	 * @param string|int|float|null $default
	 * @return string|int|float|null
	 */
	public function value($index, $default = null) {
		return $this->fromSource($_COOKIE, $index, $default);
	}

	/**
	 * @param string|int|float $index
	 * @param string|int|float $value
	 * @return Leviathan_Session
	 */
	public function store($index, $value) {
		$this->toSource($_COOKIE, $index, $value);

		return $this;
	}
}
