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

    private $table = 'mahasiswa';

    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    public function getAllMahasiswa()
    {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}