<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/config/db.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    //  $response->getBody()->write("Hello world Test!");
    $db      = new db();
    $db_conn = $db->connect();

    //TODO:write the SQL query that returns all movies with its genre
    $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM tbl_movies m';
    $query .= ' LEFT JOIN tbl_mov_genre link ON link.movies_id = m.movies_id';
    $query .= ' LEFT JOIN tbl_genre g ON link.genre_id = g.genre_id ';
    $query .= ' GROUP BY m.movies_id';

    // prepare query statement
    $stmt = $db_conn->prepare($query);

    // execute query
    $stmt->execute();
    $movies = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

    $response->getBody()->write($movies);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->run();
