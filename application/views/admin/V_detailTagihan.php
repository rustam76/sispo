<!-- DataTales Example -->
<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Detail Tagihan</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambahPesan">Kirim Pesan Tagihan <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE TAGIHAN</th>
                        <th>TANGGAL</th>
                        <th>NAMA PELANGGAN</th>
                        <th>NO HP</th>
                        <th>TOTAL TAGIHAN</th>
                        <th>Order ID</th>

                        <th>Biaya</th>
                        <th>Tipe Pembayaran</th>
                        <th>Waktu</th>
                        <th>Bank</th>
                        <th>Va Number</th>
                        <th>Status</th>


                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>KODE TAGIHAN</th>
                        <th>TANGGAL</th>
                        <th>NAMA PELANGGAN</th>
                        <th>NO HP</th>
                        <th>TOTAL TAGIHAN</th>
                        <th>Order ID</th>

                        <th>Biaya</th>
                        <th>Tipe Pembayaran</th>
                        <th>Waktu</th>
                        <th>Bank</th>
                        <th>Va Number</th>
                        <th>Status</th>


                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php $no = 1;
                    foreach ($detail as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->kode_tagihan; ?></td>
                            <td><?= $row->date_tagihan; ?></td>
                            <td><?= $row->nama_pelanggan; ?></td>
                            <td><?= $row->no_hp; ?></td>
                            <td>Rp.<?= $row->total_tagihan; ?></td>
                            <td><?= $row->order_id; ?></td>
                            <td>Rp.<?= $row->gross_amount; ?></td>
                            <td><?= $row->payment_type; ?></td>
                            <td><?= $row->transaction_time; ?></td>
                            <td><?= $row->bank; ?></td>
                            <td><?= $row->va_number; ?></td>
                            <td>
                                <?php if ($row->status_code == "200") { ?>
                                    <span class="badge badge-success">Succes</span>
                                <?php
                                } else { ?>
                                    <span class="badge badge-warning">Pending..</span>
                                <?php } ?>
                            </td>
                            </td>
                            <?php if ($this->session->userdata('level') == 1) { ?>
                                <td>

                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromPesanSatu<?= $row->id_detail; ?>"><i class="fa fa-pen"></i> Pesan</a>
                                    <a href="<?= base_url('admin/dataTagihan/hapusDataDetail/' . $row->id_detail) ?>" class="badge badge-danger" id="btn btn-hapus"><i class="fa fa-trash"></i>Hapus</a>
                                    <a href="<?= $row->pdf_url; ?>" class="badge badge-primary">Download</a>
                                </td>
                            <?php } else if ($this->session->userdata('level') == 2) { ?>
                                <td>

                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditPelanggan<?= $row->id_detail; ?>"><i class="fa fa-pen"></i> Pesan</a>
                                    <a href="<?= $row->pdf_url; ?>" class="badge badge-primary">Download</a>
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
<div class="modal fade" id="fromTambahPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Pesan Tagihan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open('admin/Pesan/kirimPesan'); ?>


                <div class="form-group">
                    <input value="3852" name="id_device" class="form-control " hidden>
                </div>
                <div class="form-group">
                    <select class="selectpicker" name="no_hp[]" multiple data-actions-box="true" data-width="100%">
                        <?php foreach ($nomor as $row) : ?>
                            <option value="<?= $row->no_hp; ?>"><?= $row->nama_pelanggan; ?> || <?= $row->no_hp; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="pesan" required id="" class="form-control ">

                    </textarea>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-danger" type="submit">Kirim</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end modal From Tambah Data -->

<!-- modal From Tambah Data -->
<?php foreach ($detail as $row) { ?>
    <div class="modal fade" id="fromPesanSatu<?= $row->id_detail; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Pesan Tagihan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open('admin/Pesan/kirimPesan'); ?>


                    <div class="form-group">
                        <input value="3852" name="id_device" class="form-control " hidden>
                    </div>
                    <div class="form-group">
                        <input value="<?= $row->no_hp ?> " name="no_hp" class="form-control " readonly>
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" required id="" class="form-control ">

                    </textarea>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-danger" type="submit">Kirim</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>