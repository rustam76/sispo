<!-- DataTales Example -->
<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
   
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambahTagih">Buat Tagihan <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE TAGIHAN</th>
                        <th>TANGGAL</th>
                        <th>BIAYA TAGIHAN</th>
               
                        <th>DETAIL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>KODE TAGIHAN</th>
                        <th>TANGGAL</th>
                        <th>BIAYA TAGIHAN</th>
                        <th>DETAIL</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $no = 1;
                    foreach ($tagihan as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->kode_tagihan; ?></td>
                            <td><?= $row->date_tagihan; ?></td>
                            <td>Rp. <?= $row->total_tagihan; ?></td>
                            <td><a href="<?= base_url('admin/dataTagihan/detailTagihan/'.$row->id_tagih);?>" class="badge badge-warning"><i class="fa fa-eye"></i> Detail</a></td>
                            <?php if($this->session->userdata('level')== 1) { ?>
                            <td>
                            <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditTagih<?= $row->id_tagih; ?>"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="<?= base_url('admin/dataTagihan/hapusTagihan/'.$row->id_tagih)?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                            <?php }else if($this->session->userdata('level')== 2) { ?>
                                    <td>
                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditPelanggan<?= $row->id_tagih; ?>"><i class="fa fa-pen"></i> Ubah</a>
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



<!-- modal From Tambah Data -->

<div class="modal fade" id="fromTambahTagih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Buat Tagihan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

            <?= form_open('admin/dataTagihan/SimpanDataTagihan'); ?>
                <div class="form-group">
                    <label for="">Kode tagihan</label>
                    <input type="text" name="kode_tagihan" class="form-control " value="TGH<?php echo sprintf("%04s", $kode_tagihan) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="date" name="date_tagihan" class="form-control " placeholder="Masukkan Kode Tagihan">
                </div>
                <div class="form-group">
                    <input type="text" name="bayar" class="form-control " placeholder="Masukkan Jumlah Tagihan">
                </div>
                <select class="selectpicker" name="id_pelanggan[]" multiple data-actions-box="true" data-width="100%">
                        <?php foreach ($nomor as $row) : ?>
                            <option value="<?= $row->id_pelanggan; ?>"><?= $row->nama_pelanggan; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p>*silahkan Pilih satu atau pilih semua</p>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end modal From Tambah Data-->

<!-- modal From edit Data -->
<?php foreach($tagihan as $row) { ?>
<div class="modal fade" id="fromEditTagih<?= $row->id_tagih; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Buat Tagihan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

            <?= form_open('admin/dataTagihan/SimpanDataTagihan'); ?>

                <input type="text"name="id_tagih" value="<?= $row->id_tagih ?>" hidden>

                <div class="form-group">
                    <label for="">Kode Tagihan</label>
                    <input type="text" name="kode_tagihan" class="form-control " value="<?= $row->kode_tagihan ?>">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Tagihan</label>
                    <input type="date" name="date_tagihan" class="form-control " value="<?= $row->date_tagihan ?>">
                </div>
                <div class="form-group">
                    <label for="">Tagihan</label>
                    <input type="text" name="bayar" class="form-control " value="<?= $row->total_tagihan ?>">
                </div>
                <select class="selectpicker strings" name="id_pelanggan[]" multiple data-actions-box="true" data-width="100%">
                        <?php foreach ($nomor as $row) : ?>
                            <option value="<?= $row->id_pelanggan; ?>"><?= $row->nama_pelanggan; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p>*silahkan Pilih satu atau pilih semua</p>
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
<!-- end modal From edit Data-->


