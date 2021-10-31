<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

if (empty(getenv('IDP_ENVIRONMENT'))) {
    //TODO: set the path from the Document Root Directory
    $app->setBasePath('/movies_api');
}

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world! This is the Movie API!");
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->run();
