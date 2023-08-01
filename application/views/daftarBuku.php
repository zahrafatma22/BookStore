<div class="card mt-2">
    <div class="card-header text-center">
        <h1>daftar Buku</h1>
    </div>
    <div class="card-body">
        
    <?= $this->session->flashdata('pesan');?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-12 mb3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            tambah buku
        </button>
        <table class="table table-success table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">kode Buku</th>
                    <th scope="col">judul Buku</th>
                    <th scope="col">Tahun terbit</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
    $no = 1;
    foreach($data_buku as $row){ ?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $row['kode_buku'];?></td>
                    <td><?= $row['judul_buku'];?></td>
                    <td><?= $row['tahun_terbit'];?></td>
                    <td><?= $row['nama_penerbit'];?></td>
                    <td><a href="<?= base_url('pages/hapus_buku/').$row['kode_buku'];?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('hapus data ini?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>hapus
                        </a>
                        <a href="<?= base_url('pages/show_edit_page/').$row['kode_buku'];?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>edit
                        </a>
                      </td>
                      
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>