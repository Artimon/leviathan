<?php

interface Leviathan_IController {
	public function index();

	/**
	 * @return Leviathan_Request
	 */
	public function request();

	/**
	 * @param int $number
	 * @return null|string
	 */
	public function argument($number);

	/**
	 * @return bool
	 */
	public function isAjax();

	/**
	 * @param string $url
	 * @throws Leviathan_ShutdownException
	 */
	public function redirect($url);

	/**
	 * @param Leviathan_Template $template
	 * @param string $path
	 */
	public function render(Leviathan_Template $template, $path);

	/**
	 * @param Leviathan_Template $template
	 */
	public function json(Leviathan_Template $template);
}