<div class="container mt-5" id="mahasiswa">
    <div class="row">
      <div class="col-lg-12">
          <? Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-lg-12">
          <button type="button" class="btn btn-primary mb-2 btn-tambah" data-toggle="modal" data-target="#formModal">
              Tambah Data Mahasiswa
          </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-12">
        <!-- <form action="<?= BASE_URL ?>/mahasiswa/cari" method="post"> -->
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="btnCari">Cari</button>
            </div>
          </div>
        <!-- </form> -->
      </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group mt-3" id="list-mahasiswa">
                <?php $no = 1; foreach($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']?>
                        <span>
                          <a href="<?= BASE_URL ?>/mahasiswa/detail/<?= $mhs['id']?>" class="btn btn-primary">Detail</a>
                          <a class="btn btn-warning text-light" id="btn-edit" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']?>">Edit</a>
                          <a href="<?= BASE_URL ?>/mahasiswa/hapus/<?= $mhs['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</a>
                        </span>  
                    </li>
                <? endforeach; ?>  
            </ul>
            <div id="result">
            
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data Mahasiswa -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL ?>/mahasiswa/tambah" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                    <option value="DKV">DKV</option>
                    <option value="Animasi">Animasi</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
