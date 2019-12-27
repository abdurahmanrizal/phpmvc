<?php

class Mahasiswa extends Controller {

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs']   = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs']   = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {

            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;

        } else {

            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;

        }
    }

    public function hapus($id)
    {
        $data = $this->model('Mahasiswa_model')->hapusDataMahasiswa($id);

        if($data > 0) {

            Flasher::setFlash('Berhasil', 'Menghapus', 'success');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;

        } else {
            
            Flasher::setFlash('Gagal', 'Menghapus', 'danger');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;
        }
    }

    public function update()
    {

        if($this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0) {
           
            Flasher::setFlash('Berhasil', 'Mengupdate', 'success');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;

        } else {
            
            Flasher::setFlash('Gagal', 'Mengupdate', 'danger');
            header('location:'. BASE_URL . '/mahasiswa');
            exit;
        }

        
    }

    public function getDataMahasiswa()
    {
        $data   = $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']);

        echo json_encode($data);
    }

    public function cari()
    {
        $data  = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $output = '';
        $output .= '<ul class="list-group mt-3">';

        foreach($data as $listMhs) {
          $output .= '<li class="list-group-item d-flex justify-content-between align-items-center" id="listMhs">
                     '.$listMhs["nama"].'
                     <span>
                        <a href="<?= BASE_URL ?>/mahasiswa/detail/'.$listMhs["id"].'" class="btn btn-primary">Detail</a>
                        <a class="btn btn-warning text-light" id="btn-edit" data-toggle="modal" data-target="#formModal" data-id="'.$listMhs["id"].'">Edit</a>
                        <a href="<?= BASE_URL ?>/mahasiswa/hapus/'.$listMhs["id"].'" class="btn btn-danger" onclick="return confirm("Are you sure you want to delete this item?");">Hapus</a>
                    </span>';
        }
        
        $output .= '</li></ul>';
        echo $output;
    }

}