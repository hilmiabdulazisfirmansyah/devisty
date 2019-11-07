<?php

$app->get('/', 'HomeController:index')->setName('home');
$app->get('/auth/register', 'AuthController:getRegister')->setName('auth.register');
$app->post('/auth/register', 'AuthController:postRegister');
