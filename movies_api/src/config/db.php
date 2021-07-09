<?php
class db
{

    private $host = "localhost";

    private $db_name = "db_movies";

    private $username = "root";

    private $password = "";

    public function connect()
    {
        $db_dsn = array(
            'host'    => $this->host,
            'dbname'  => $this->db_name,
            'charset' => 'utf8',
        );

        if (getenv('IDP_ENVIRONMENT') === 'docker') {
            $db_dsn['host'] = 'mysql';
            $this->username = 'docker_u';
            $this->password = 'docker_p';
        }

        try {
            $dsn     = 'mysql:' . http_build_query($db_dsn, '', ';');
            $db_conn = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo json_encode(
                array(
                    'error'   => 'Database connection failed',
                    'message' => $exception->getMessage(),
                )
            );
        }
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // return the database connection back
        return $db_conn;
    }
}
