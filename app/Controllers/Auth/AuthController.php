<?php

namespace Devisty\Controllers\Auth;

use Devisty\Controllers\Controller;

class AuthController extends Controller
{

	public function getRegister($request, $response)
	{
		
		return $this->view->render($response, 'auth/register.devisty');

	}

	public function postRegister()
	{
		


	}
}

