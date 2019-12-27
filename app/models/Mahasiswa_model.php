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

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa(nama, nim, email, jurusan) VALUES (:nama, :nim, :email, :jurusan)";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusDataMahasiswa($id)
    {
        $query = 'DELETE FROM mahasiswa WHERE id=:id';
        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function updateDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama=:nama, nim=:nim, email=:email, jurusan=:jurusan WHERE id=:id";

        $this->db->query($query);

        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        
        return $this->db->rowCount();

    }

    public function cariDataMahasiswa()
    {
        $keyword    = $_POST['keyword'];
        $query      = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}