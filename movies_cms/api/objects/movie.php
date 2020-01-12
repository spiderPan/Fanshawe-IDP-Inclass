<?php
class Movie
{

    private $conn;

    // Note: update table names, column names in here
    public $movie_table               = 'tbl_movies';
    public $genre_table               = 'tbl_genre';
    public $movie_genre_linking_table = 'tbl_mov_genre';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getMovies()
    {
        //TODO:write the SQL query that returns all movies from the tbl_movies table
        // $query = 'SELECT * FROM '.$this->movies_table;


        //TODO:write the SQL query that returns all movies with its genre
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        $query .= ' GROUP BY m.movies_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getMovieByGenre($genre){
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        $query .= ' GROUP BY m.movies_id';
        $query .= ' HAVING genre_name LIKE "%'.$genre.'%"';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getMovieByID($id)
    {
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        $query .= ' WHERE m.movies_id=' . $id;
        $query .= ' GROUP BY m.movies_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
