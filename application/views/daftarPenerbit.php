<div class="card mt-2">
    <div class="card-header text-center">
    <h1>daftar penerbit</h1>
    </div>
    <div class="card-body">
    <?= $this->session->flashdata('pesan');?>

    <button type="button" class="btn btn-primary col-12 mb3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            tambah penerbit
        </button>
    <table class="table table-success table-striped" id ="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">kode penerbit</th>
      <th scope="col">nama penerbit</th>
      <th scope="col">alamat penerbit</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($data_penerbit as $row){ ?>
        <tr>
      <th scope="row"><?= $no++;?></th>
      <td><?= $row['kode_penerbit'];?></td>
      <td><?= $row['nama_penerbit'];?></td>
      <td><?= $row['alamat_penerbit'];?></td>
      <td><a href="<?= base_url('pages/hapus_penerbit/').$row['kode_penerbit'];?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('hapus data ini?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>hapus
                        </a>
                        <a href="<?= base_url('pages/show_edit_page1/').$row['kode_penerbit'];?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>edit
                        </a>
                      </td>
    </tr> 
   <?php } ?>
  </tbody>
</table>
    </div>
</div>
<!-- <h1>daftar penerbit</h1> -->
<!-- <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">kode penerbit</th>
      <th scope="col">nama penerbit</th>
      <th scope="col">alamat penerbit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($data_penerbit as $row){ ?>
        <tr>
      <th scope="row"><?= $no++;?></th>
      <td><?= $row['kode_penerbit'];?></td>
      <td><?= $row['nama_penerbit'];?></td>
      <td><?= $row['alamat_penerbit'];?></td>
    </tr> 

   <?php } ?>

  </tbody>
</table> -->