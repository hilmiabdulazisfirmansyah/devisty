<?php

$app->get('/', 'HomeController:index');
$app->get('/auth/register', 'AuthController:getRegister')->setName('auth.register');
$app->post('/auth/register', 'AuthController:postRegister');
