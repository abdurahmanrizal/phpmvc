<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group mt-3">
                <?php $no = 1; foreach($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']?>
                        <a href="<?= BASE_URL ?>/mahasiswa/detail/<?= $mhs['id']?>" class="badge badge-primary btn">Detail</a>
                    </li>
                <? endforeach; ?>
               
            </ul>
        </div>
    </div>
</div>