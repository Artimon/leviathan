<?php

/**
 * Class Leviathan_Facebook
 *
 * @see https://github.com/facebook/facebook-php-sdk
 */
class Leviathan_Facebook {
	const SIGNED_REQUEST_ALGORITHM = 'HMAC-SHA256';

	/**
	 * @var string
	 */
	private $appSecret = '';

	/**
	 * @param string $appSecret
	 */
	public function __construct($appSecret) {
		$this->appSecret = $appSecret;
	}

	/**
	 * @param string $input
	 * @return string
	 */
	protected function base64UrlDecode($input) {
		return base64_decode(
			strtr($input, '-_', '+/')
		);
	}

	/**
	 * @param string $signedRequest
	 * @return array
	 * @throws InvalidArgumentException
	 */
	public function parseSignedRequest($signedRequest) {
		if (!$signedRequest || strpos($signedRequest, '.') === false) {
			throw new InvalidArgumentException('Signed request was invalid!');
		}

		list($encodedSignature, $payload) = explode('.', $signedRequest, 2);

		// decode the data
		$signature = $this->base64UrlDecode($encodedSignature);
		$data = json_decode(
			$this->base64UrlDecode($payload),
			true
		);

		if (
			!isset($data['algorithm']) ||
			strtoupper($data['algorithm']) !==  self::SIGNED_REQUEST_ALGORITHM
		) {
			$message = 'Unknown algorithm. Expected ' . self::SIGNED_REQUEST_ALGORITHM;
			throw new InvalidArgumentException($message);
		}

		// check sig
		$expectedSignature = hash_hmac(
			'sha256',
			$payload,
			$this->appSecret,
			$raw = true
		);

		if (strlen($expectedSignature) !== strlen($signature)) {
			throw new InvalidArgumentException('Bad Signed JSON signature!');
		}

		$result = 0;
		for ($i = 0; $i < strlen($expectedSignature); $i++) {
			$result |= ord($expectedSignature[$i]) ^ ord($signature[$i]);
		}

		if ($result !== 0) {
			throw new InvalidArgumentException('Bad Signed JSON signature!');
		}

		return $data;
	}
}