<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Daftar Mahasiswa</h3>

            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($data['mhs'] as $mhs) : ?>
                            <tr>
                                <th scope="row"><?=  $no++ ?></th>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['email'] ?></td>
                                <td><?= $mhs['jurusan'] ?></td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            
        </div>
    </div>
</div>