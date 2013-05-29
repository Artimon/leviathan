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

	/**
	 * @param array|string $data
	 * @param bool $magicQuotes
	 */
	private function strip(&$data, $magicQuotes) {
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				$this->strip($data[$key], $magicQuotes);
			}

			return;
		}

		// Must be string anyway, but just to be sure.
		$data = (string)$data;
		$data = strip_tags($data);

		if ($magicQuotes) {
			$data = stripslashes($data);
		}
	}

	/**
	 * @param array $data
	 * @param string $key
	 */
	protected function purify(array &$data, $key) {
		static $memory = array();

		if (array_key_exists($key, $memory)) {
			return;
		}

		$this->strip(
			$data,
			get_magic_quotes_gpc()
		);

		$memory[$key] = true;
	}
}