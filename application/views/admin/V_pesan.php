<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
   
<div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>NO HP</th>
                        <th>ISI PESAN</th>
                        <th>DEVICE</th>
                        <th>PROSES</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>NO HP</th>
                        <th>ISI PESAN</th>
                        <th>DEVICE</th>
                        <th>PROSES</th>
                        <th>AKSI</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $no = 1;
                    foreach ($pesan as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->tanggal; ?></td>
                            <td><?= $row->no_hp; ?></td>
                            <td><?= $row->isi_pesan; ?></td>
                            <td><?= $row->device; ?></td>
                            <td><?php if($row->proses==1){
                                echo '<label class="badge badge-success" type="label">Terkirim</label>';}
                            else if ($row->proses==2){
                                echo '<label class="badge badge-danger" type="label">Gagal !</label>';}
                            else if ($row->proses==0){
                                echo '<label class="badge badge-warning" type="label">menuggu jadwal !</label>';}
                            ?>
                             </td>
                            <?php if($this->session->userdata('level')== 1) { ?>
                            <td>
                            <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditpesan<?= $row->id_pesan; ?>"><i class="fa fa-pen"></i> Kirim Ulang</a>
                                <a href="<?= base_url('admin/Pesan/hapusDataPesan/'.$row->id_pesan)?>" class="badge badge-danger" id="btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                            <?php }else if($this->session->userdata('level')== 2) { ?>
                                    <td>
                                    <a class="badge badge-primary" data-toggle="modal" data-target="#fromEditPelanggan<?= $row->id_tagih; ?>"><i class="fa fa-pen"></i> Kirim Ulang</a>
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

