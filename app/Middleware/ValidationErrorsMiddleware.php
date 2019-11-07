<?php

namespace Devisty\Middleware;

class ValidationErrorsMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		$this->container->view->getEnvironment()->addGlobal('errors', isset($_SESSION['errors']) ? $_SESSION['errors']: null);
		unset($_SESSION['errors']);

		$response = $next($request, $response);
		return $response;
	}
}