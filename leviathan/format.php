<?php

/**
 * Static method formatter class.
 *
 * Static condition:
 * With the same input you ALWAYS get the same result.
 * No dependencies on database, cache, session, get, post, etc.
 */
class Leviathan_Format {
	/**
	 * Formats remaining seconds into d/h/m/s formats.
	 *
	 * @param int $remainingTime in seconds
	 * @return string
	 */
	public static function duration($remainingTime) {
		$days = (int)($remainingTime / 86400);
		$remainingTime -= $days * 86400;

		$hours = (int)($remainingTime / 3600);
		$remainingTime -= $hours * 3600;

		if ($days > 0) {
			return "{$days}d {$hours}h";
		}


		$minutes = (int)($remainingTime / 60);
		$remainingTime -= $minutes * 60;

		if ($hours > 0) {
			return "{$hours}h {$minutes}m";
		}


		$seconds = max(0, $remainingTime);

		if ($minutes > 0) {
			return "{$minutes}m {$seconds}s";
		}

		return "{$seconds}s";
	}
}
