<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Karyawan</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambahUser">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Jabatan</th>
                        <th>status</th>

                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Jabatan</th>
                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $row) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->level; ?></td>
                            
                            <td>
                                <?php if ($row->status == "aktif") {
                                    echo '<label class="badge badge-success" type="label">Aktif</label>';
                                } else if ($row->status == "tidak") {
                                    echo '<label class="badge badge-danger" type="label">Tidak</label>';
                                }
                                ?>
                            </td>
                            
                            <td>
                                <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditUser<?= $row->id_user; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="<?= base_url('admin/dataUser/hapusDataUser/' . $row->id_user) ?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal tambah-->
<div class="modal fade" id="fromTambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Karyawan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open('admin/dataUser/simpanDataUser'); ?>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="username" class="form-control " placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control " placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control " placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="">Pilih Akses</label>
                    <select class="form-control" name="level">
                        <option value="">Silahkan Pilih Hak Akses</option>
                        <?php foreach ($role as $row) { ?>
                            <option value="<?= $row->id_role; ?>"><?= $row->level; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih Akses</label>
                    <select class="form-control" name="status">
                        <option value="aktif">Aktif</option>
                        <option value="tidak">Tidak</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="fot" class="form-control ">
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
<!-- end tambah -->

<!-- modal edit-->
<?php foreach ($user as $row) { ?>
    <div class="modal fade" id="fromEditUser<?= $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Data Karyawan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open('Admin/dataUser/updateDataUser'); ?>
                    <input type="text" name="id_user" value="<?= $row->id_user ?>" hidden>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="username" class="form-control " value="<?= $row->username ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control " value="<?= $row->email ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control " value="<?= $row->password ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Akses</label>
                        <select class="form-control" name="level">
                            <option value="<?= $row->level ?>"><?= $row->level ?></option>
                            <?php foreach ($role as $row) { ?>
                                <option value="<?= $row->id_role; ?>"><?= $row->level; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Akses</label>
                        <select class="form-control" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="tidak">Tidak</option>

                        </select>
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
<?php } ?>
<!-- end edit -->