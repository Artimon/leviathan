<?php

class Leviathan_Randomizer {
	/**
	 * @var bool
	 */
	private $initialized = false;

	private function init() {
		if ($this->initialized) {
			return;
		}

		srand((double)microtime() * 1000000);
		$this->initialized = true;
	}

	/**
	 * @param int $min
	 * @param int $max
	 * @return int
	 */
	public function get($min, $max) {
		$this->init();

		return rand($min, $max);
	}
}