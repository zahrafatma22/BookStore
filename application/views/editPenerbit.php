<form action="<?= base_url('pages/update_penerbit');?>" method="POST">

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nama penerbit" name="namaPenerbit" value="<?= $data_penerbit['nama_penerbit'];?>" >
                    <input type="hidden" name="kodePenerbit" value="<?= $data_penerbit['kode_penerbit'];?>">
                    <label for="floatingInput">Nama Penerbit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="alamat penerbit" name="alamatPenerbit" value="<?= $data_penerbit['alamat_penerbit'];?>" >
                    <label for="floatingInput">Alamat Penerbit</label>
                </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="margin-right:10px" onclick="history.back()">kembali</button>
                <button type= submit class="btn btn-primary">Save changes</button>
                </div>
</form>