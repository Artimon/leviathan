<?php

/**
 * Class Leviathan_StaticRandom
 *
 * Well, sounds somewhat ridiculous, but if you want to get a random
 * number sequence, but always the same sequence with the same seed,
 * this one may be your friend.
 */
class Leviathan_StaticRandom {
	/**
	 * @var int
	 */
	private $seed;


	/**
	 * @param $seed int
	 */
	public function __construct($seed) {
		$this->seed = $seed;
	}

	/**
	 * @param int $min
	 * @param int $max
	 * @return int
	 */
	public function random($min, $max) {
		$this->seed = abs(($this->seed * 2434757) % 101);

		$randomFactor = ($this->seed / 100);

		$difference = $max - $min;
		$difference *= $randomFactor;

		return (int)round($min + $difference);
	}
}