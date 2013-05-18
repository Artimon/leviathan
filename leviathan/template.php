<?php

class Leviathan_Template {
	private $data = array();

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return Leviathan_Template
	 */
	public function assignValue($key, $value) {
		$this->data[$key] = $value;

		return $this;
	}

	/**
	 * @param array $data
	 * @return Leviathan_Template
	 */
	public function assignArray(array $data) {
		$this->data = array_merge($this->data, $data);

		return $this;
	}

	/**
	 * @param string $filePath
	 * @return string
	 */
	public function render($filePath) {
		ob_start();

		extract($this->data);

		include $filePath;

		return ob_get_clean();
	}
}