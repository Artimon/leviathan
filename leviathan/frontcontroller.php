<?php

class Leviathan_FrontController {
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
	private $parameters;

	/**
	 * @param string $default route.
	 * @param string $error route.
	 */
	public function __construct($default, $error) {
		$request = array_key_exists('REQUEST_URI', $_SERVER)
			? trim($_SERVER['REQUEST_URI'], '/')
			: '';

		$route = $default;
		$parts = array();

		$routes = require_once dirname(__DIR__) . '/config/routes.php';
		foreach ($routes as $routeKey => $routeData) {
			if (strpos($request, $routeKey) !== false) {
				$route = str_replace($routeKey, '', $request);
				$route = trim($route, '/');
				if ($route) {
					$parts = explode('/', $route);
				}

				$route = $routeKey;

				break;
			}
		}

		if (!array_key_exists($route, $routes)) {
			$route = $error;
			$parts = array();
		}

		$this->route = $route;
		$this->settings = $routes[$route];
		$this->parameters = $parts;
	}

	/**
	 * @return Leviathan_IController
	 */
	public function controller() {
		$controller = $this->settings['controller'];

		return new $controller(
			$this->route,
			$this->settings,
			$this->parameters
		);
	}

	/**
	 * @return string
	 */
	public function route() {
		return $this->route;
	}

	/**
	 * @param array $parameters
	 * @return string
	 */
	public static function buildRoute(array $parameters) {
		return '/' . implode('/', $parameters);
	}
}