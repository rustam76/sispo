<div class="container-fluid mt-2">
    <!-- DataTales Example -->
    <h5 class="text-center mb-3">Data transaksi</h5>
<div class="card shadow-sm mb-4 border-bottom-primary">

    <?php $no = 1;
    foreach ($transaksi as $row) :
    ?>
   
        <div class="card-body">
        
            <div class="table-responsive">
                <table>
                    <tr>
                        <td width="50%">Order Id</td>
                        <td>:</td>
                        <td><?= $row->order_id; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $row->nama_pelanggan; ?></td>
                    </tr>
                    <tr>
                        <td>Biaya</td>
                        <td>:</td>
                        <td>Rp.<?= $row->gross_amount; ?></td>
                    </tr>
                    <tr>
                        <td>Tipe Pembayaran</td>
                        <td>:</td>
                        <td><?= $row->payment_type; ?></td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td><?= $row->transaction_time; ?></td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td>:</td>
                        <td><?= $row->bank; ?></td>
                    </tr>
                    <tr>
                        <td>Va_number</td>
                        <td>:</td>
                        <td><?= $row->va_number; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php if ($row->status_code == "200") { ?>
                                <span class="badge badge-success">Succes</span>
                            <?php
                            } else { ?>
                                <span class="badge badge-warning">Pending..</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Cetak</td>
                        <td>:</td>
                        <td><a href="<?= $row->pdf_url; ?>" class="badge badge-primary">Download</a></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php $no++;
    endforeach; ?>

</div>
</div>
