<?php

namespace Devisty\Controllers\Auth;

use Devisty\Models\User;
use Devisty\Controllers\Controller;

class AuthController extends Controller
{

	public function getRegister($request, $response)
	{
		return $this->view->render($response, 'auth/register.devisty');
	}

	public function postRegister($request, $response)
	{
		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT ),
		]);

		return $response->withRedirect($this->router->pathFor('home'));
	}
}

