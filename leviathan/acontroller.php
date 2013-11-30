<?php

abstract class Leviathan_AController implements Leviathan_IController {
	/**
	 * @var string
	 */
	private $route;

	/**
	 * @var array
	 */
	private $settings;

	/**
	 * @var array
	 */
	protected $params;

	/**
	 * @param string $route
	 * @param array $settings
	 * @param array $params
	 */
	public function __construct($route, array $settings, array $params) {
		$this->route = $route;
		$this->settings = $settings;
		$this->params = $params;
	}

	/**
	 * @return array ['title', 'template']
	 */
	abstract protected function pageData();

	/**
	 * @return string
	 */
	public function route() {
		return $this->route;
	}

	/**
	 * @return Leviathan_Request
	 */
	public function request() {
		return Leviathan_Request::getInstance();
	}

	/**
	 * @param int $number
	 * @return null|string
	 */
	public function argument($number) {
		if (array_key_exists($number, $this->params)) {
			return $this->params[$number];
		}

		return null;
	}

	/**
	 * @return bool
	 */
	public function isAjax() {
		if (array_key_exists('ajax', $this->settings)) {
			return (bool)$this->settings['ajax'];
		}

		return false;
	}

	/**
	 * @param string $url
	 * @throws Leviathan_ShutdownException
	 */
	public function redirect($url) {
		$url = html_entity_decode($url);
		header('location: ' . $url);

		throw new Leviathan_ShutdownException();
	}

	/**
	 * @throws Leviathan_ShutdownException
	 */
	public function unauthorized() {
		header('HTTP/1.1 401 Unauthorized');
		throw new Leviathan_ShutdownException();
	}

	protected function assertAdministrator() {
		return;
	}

	/**
	 * @param Leviathan_Template $template
	 * @param string $path
	 */
	public function partial(Leviathan_Template $template, $path) {
		echo $template->render("source/view/{$path}.php");
	}

	/**
	 * @param Leviathan_Template $template
	 */
	public function json(Leviathan_Template $template) {
		header('Content-type: application/json');

		echo $template->json();
	}
}