<?php

/**
 * Abstract class for implementations of global php variable readers.
 */
abstract class Leviathan_GlobalsAbstract {
	/**
	 * @param array $source
	 * @param string|int|float $index
	 * @param string|int|float|null $default
	 * @return string|int|float|null
	 */
	protected function fromSource(array &$source, $index, $default) {
		if (array_key_exists($index, $source)) {
			return $source[$index];
		}

		return $default;
	}

	/**
	 * @param array $source
	 * @param string|int|float $index
	 * @param string|int|float|null $value
	 * @return Leviathan_GlobalsAbstract
	 */
	protected function toSource(array &$source, $index, $value) {
		$source[$index] = $value;

		return $this;
	}
}
