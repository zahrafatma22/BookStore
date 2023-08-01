<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penerbit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="<?= base_url('pages/simpan_penerbit');?>" method="POST">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Penerbit" name="namaPenerbit" >
                    <label for="floatingInput">Nama Penerbit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Penerbit" name="alamatPenerbit" >
                    <label for="floatingInput">Alamat Penerbit</label>
                </div>
            
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type= submit class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>