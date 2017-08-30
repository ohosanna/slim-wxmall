<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/hello', function (Request $request, Response $response) {
  $data = array('name' => 'Bob', 'age' => 40);

  return $response->withJson($data);
});

$app->get('/signin', 'UserController:signIn');
$app->post('/signin', 'UserController:signIn');
$app->get('/signout', 'UserController:signOut');