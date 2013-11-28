<?php

/**
 * Global collection for JavaScript calls, bindings and the likes.
 *
 * Add your javascript and retrieve it when you need it to assign it
 * to your page.
 */
class Leviathan_JavaScript {
	/**
	 * @var string
	 */
	private $bindings = '';

	/**
	 * @return Leviathan_JavaScript
	 */
	public static function getSingleton() {
		static $instance;

		if ($instance === null) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Note:
	 * Adds tailing semicolon if not there.
	 *
	 * @param string $js
	 * @return Leviathan_JavaScript
	 */
	public function bind($js) {
		$js = rtrim($js, ';') . ';';

		$this->bindings .= "\n{$js}\n";

		return $this;
	}

	/**
	 * @return string
	 */
	public function bindings() {
		return $this->bindings;
	}
}
