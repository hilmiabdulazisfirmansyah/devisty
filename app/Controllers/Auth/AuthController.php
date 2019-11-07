<?php

namespace Devisty\Controllers\Auth;

use Devisty\Models\User;
use Devisty\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{

	public function getRegister($request, $response)
	{
		return $this->view->render($response, 'auth/register.devisty');
	}

	public function postRegister($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::noWhitespace()->notEmpty(),
			'name' => v::noWhitespace()->notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.register'));
		}

		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT ),
		]);

		return $response->withRedirect($this->router->pathFor('home'));
	}
}

