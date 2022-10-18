<div class="col-xl-12 col-lg-12 mt-2">
    <h5 class="text-center">Data Diri Pelanggan</h5>
    <div class="card mb-4">
        <!-- Card Header - Accordion -->

        <!-- Card Content - Collapse -->

        <div class="card-body text-center">
            <img src="<?php echo base_url('assets/pelanggan/' . $this->session->userdata('foto')); ?>" alt="" width="100px" height="100px">
            <div class="mt-4 text-left large">
                <table class="mb-4">
                    <tr>
                        <td width="50%">Nama</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('nama_pelanggan'); ?></td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('no_hp'); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $this->session->userdata('alamat'); ?></td>
                    </tr>
                </table>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#fromEdit">Ubah Data</button>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#logoutModal">LogOut</button>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal From Edit Data -->

<div class="modal fade " id="fromEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Ubah Data Pelanggan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open_multipart('admin/dataPelanggan/editDataPelanggan'); ?>

                <input type="text" name="id_pelanggan" value="" hidden>

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama_pelanggan" class="form-control " value="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control " value="">
                </div>
                <div class="form-group">
                    <label for="">No Hp</label>
                    <input type="text" name="no_hp" class="form-control " value="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control " value="">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control " value="">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control ">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- end modal From edit Tambah Data  -->