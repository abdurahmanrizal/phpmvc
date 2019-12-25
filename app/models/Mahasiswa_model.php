<?php

class Mahasiswa_model {
    // Static array Associative 
    // private $mhs =[
    //     [
    //         "nama"      => "Abdurahman",
    //         "nim"       => "A11.2015.09266",
    //         "email"     => "abdurahmanrizal1@gmail.com",
    //         "jurusan"   => 'Teknik Informatika'

    //     ],
    //     [
    //         "nama"      => "Abdurahman",
    //         "nim"       => "A11.2015.09266",
    //         "email"     => "abdurahmanrizal1@gmail.com",
    //         "jurusan"   => 'Teknik Informatika'

    //     ]
    // ];

    // data dari database menggunakan pdo
    private $dbh; // database handler
    private $stmt;
    
    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=localhost;dbname=phpmvc";

        try {

            $this->dbh = new PDO($dsn, 'root', '');

        }catch(PDOException $e) {

            die($e->getMessage());

        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}