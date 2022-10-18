<!-- DataTales Example -->
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
        <a class="btn btn-primary" data-toggle="modal" data-target="#fromTambahKategori">KIRIM PESAN <i class="fa fa-plus" style="margin-left: 10px;"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>KODE TAGIHAN</th>
                        <th>NAMA PELANGGAN</th>
                        <th>BULAN</th>
                        <th>TAHUN</th>
                        <th>TAGIHAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>KODE TAGIHAN</th>
                        <th>NAMA PELANGGAN</th>
                        <th>BULAN</th>
                        <th>TAHUN</th>
                        <th>TAGIHAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $no = 1;
                    foreach ($tagihan as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->kode; ?></td>
                            <td><?= $row->nama_pelanggan; ?></td>
                            <td><?= $row->bulan; ?></td>
                            <td><?= $row->tahun; ?></td>
                            <td>Rp. <?= $row->bayar; ?></td>
                            <td > <a href="#" class="badge badge-secondary"> Belum Bayar</a></td>
                            <td>

                                <a href="<?= base_url('dataTagihan/Edittagihan/' . $row->id_tagihan) ?>" class="badge badge-primary"><i class="fa fa-pen"></i>Edit</a>

                                <a href="<?= base_url('dataTagihan/HapusDatatagihan/' . $row->id_tagihan) ?>" class="badge badge-danger"><i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal From Tambah Data Arsip -->
<div class="modal fade" id="fromTambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Pesan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open('admin/dataTagihan/kirimPesan'); ?>


                <div class="form-group">
                    <input value="3852" name="id_device" class="form-control ">
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
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end modal From Tambah Data Arsip -->