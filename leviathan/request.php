<?php

/**
 * Request data retrieval.
 */
class Leviathan_Request extends Leviathan_GlobalsAbstract {
	private static $instance;

	/**
	 * @return Leviathan_Request
	 */
	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Return defined get parameter.
	 *
	 * @param string $index
	 * @param mixed $default
	 * @return string|array
	 */
	public function get($index, $default = null) {
		return $this->fromSource($_GET, $index, $default);
	}

	/**
	 * Return defined post parameter.
	 *
	 * @param string $index
	 * @param mixed $default
	 * @return string|array
	 */
	public function post($index, $default = null) {
		return $this->fromSource($_POST, $index, $default);
	}

	/**
	 * Return defined post parameter.
	 *
	 * @param string $index
	 * @param mixed $default
	 * @return string|array
	 */
	public function both($index, $default = null) {
		return $this->fromSource($_REQUEST, $index, $default);
	}

	/**
	 * @param string $index
	 * @param mixed $default
	 * @return float|int|null|string
	 */
	public function server($index, $default = null) {
		return $this->fromSource($_SERVER, $index, $default);
	}

	/**
	 * Return defined cookie parameter.
	 *
	 * @param string $index
	 * @param mixed $default
	 * @return string|array
	 */
	public function cookie($index, $default = null) {
		return $this->fromSource($_COOKIE, $index, $default);
	}
}