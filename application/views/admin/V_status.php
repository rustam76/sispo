<!-- DataTales Example -->
<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Status Pembayaran</h6>
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

                        <th>STATUS</th>
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

                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php $no = 1;
                    foreach ($status as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->kode_tagihan; ?></td>
                            <td><?= $row->date_tagihan; ?></td>
                            <td><?= $row->nama_pelanggan; ?></td>
                            <td><?= $row->no_hp; ?></td>
                            <td><?= $row->total_tagihan; ?></td>
                            <td>
                            <?php if ($row->status_code == 200) {
                                                echo '<label class="badge badge-success" type="label">Success</label>';
                                            } else if ($row->status_code == 201) {
                                                echo '<label class="badge badge-danger" type="label">Pendding</label>';
                                            }
                                            ?>
                            </td>
                            
                            <td>
                            <a href="<?= $row->pdf_url; ?>" class="badge badge-primary">Download</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>