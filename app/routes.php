<?php

$app->get('/hilmi', function($request, $response){
	return $this->view->render($response, 'home.devisty');
});

