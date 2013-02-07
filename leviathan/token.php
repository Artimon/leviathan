<?php

class Leviathan_Token {
	const LEVIATHAN_TOKEN = 'leviathan_token';

	/**
	 * @return Leviathan_Token
	 */
	public static function getInstance() {
		return new self();
	}

	/**
	 * @return Leviathan_Session
	 */
	public function session() {
		return Leviathan_Session::getInstance();
	}

	/**
	 * @return Leviathan_Request
	 */
	public function request() {
		return Leviathan_Request::getInstance();
	}

	/**
	 * @return string
	 */
	private function create() {
		$hash = microtime() . '_token';
		$hash = md5($hash);

		$token = substr($hash, 3, 8);
		$this->session()->store(self::LEVIATHAN_TOKEN, $token);

		return $token;
	}

	/**
	 * @return string
	 */
	public function get() {
		$token = $this->session()->value(self::LEVIATHAN_TOKEN);

		if (empty($token)) {
			$token = $this->create();
		}

		return $token;
	}

	/**
	 * Pass the post/get key of the token.
	 *
	 * @param string $key
	 * @return bool
	 */
	public function valid($key) {
		$token = $this->request()->both($key);
		if ($token === $this->get()) {
			$this->create();

			return true;
		}

		return false;
	}
}
