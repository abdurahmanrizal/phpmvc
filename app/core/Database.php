<?php

class Database {
    private $host    = DB_HOST;
    private $user    = DB_USER;
    private $pass    = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->db_name;
        $option = [
            // untuk memmbuat database kita terjaga terus
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        ];

        try {
            // variabel option digunakan untuk mengoptimasi database yang dibuat
            $this->dbh = new PDO($dsn, $this->user , $this->pass, $option);

        }catch(PDOException $e) {

            die($e->getMessage());

        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if( is_null( $type ) ) {
            // kenapa true untuk menjalankan saja
            switch( true ) {
                // untuk value apabila integer
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                // untuk value apabila boolean
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                // untuk value apabila NULL
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        // dalam PDO apabila kita menginginkan data yang banyak menggunakan function fetch all
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        // dalam PDO apabila kita menginginkan data hanya salah satu yang ditampilkan menggunakan function fetch
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}