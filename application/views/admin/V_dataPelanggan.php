    <!-- Begin Page Content -->
<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
   
    <div class="card shadow mb-4 border-bottom-primary">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Data Pelanggan</h6>
            <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambahPelanggan">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelanggan as $row) :
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row->nama_pelanggan; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->password; ?></td>
                                <td><?= $row->no_hp; ?></td>
                                <td><?= $row->alamat; ?></td>
                                <td><img src="<?php echo base_url('assets/pelanggan/' . $row->foto); ?>" alt="" width="50px" height="50px"></td>
                                <?php if($this->session->userdata('level')== 1) { ?>
                                <td>
                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditPelanggan<?= $row->id_pelanggan; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                    <a href="<?= base_url('admin/dataPelanggan/hapusDataPelanggan/'.$row->id_pelanggan) ?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <?php }else if($this->session->userdata('level')== 2) { ?>
                                    <td>
                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditPelanggan<?= $row->id_pelanggan; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end data -->

    <!-- modal From Tambah Data -->
    <div class="modal fade " id="fromTambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Pelanggan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open_multipart('Admin/dataPelanggan/simpanDataPelanggan'); ?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama_pelanggan" class="form-control " placeholder="Masukkan Nama Pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control " placeholder="Masukkan Email Pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" name="no_hp" class="form-control " placeholder="Masukkan No Hp Pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control " placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control " placeholder="Masukkan Alamaat Pelanggan" required>
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
    <!-- end modal From Tambah Data -->

    <!-- modal From Edit Data -->
    <?php foreach ($pelanggan as $row) : ?>
        <div class="modal fade " id="fromEditPelanggan<?= $row->id_pelanggan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        <input type="text" name="id_pelanggan" value="<?= $row->id_pelanggan; ?>" hidden>

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama_pelanggan" class="form-control " value="<?= $row->nama_pelanggan; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control " value="<?= $row->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">No Hp</label>
                            <input type="text" name="no_hp" class="form-control " value="<?= $row->no_hp; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control " value="<?= $row->password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control " value="<?= $row->alamat; ?>">
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
    <?php endforeach; ?>
    <!-- end modal From edit Tambah Data  -->

    <?php foreach ($pelanggan as $row) : ?>
        <div class="modal" id="hapus<?= $row->id_pelanggan; ?>" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <?= form_open('dataPelanggan/HapusDataArsip'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data <?= $row->nama_pelanggan; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?= base_url('assets/img/trash.png'); ?>" width="100px" height="100px">
                        <p></p>
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini.?</p>
                        <input type="hidden" name="id_arsip" value="<?= $row->id_pelanggan ?>">
                    </div>
                    <div style="align-items: center;" class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    </div>
                </div>
                <?= form_close() ?>

            </div>
        </div>
    <?php endforeach; ?>