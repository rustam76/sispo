<div class="container-fluid mt-2">
    <div class="card shadow-sm mb-4">
        <!-- Card Header - Accordion -->

        <!-- Card Content - Collapse -->

        <div class="card-body text-center">
            <img src="<?php echo base_url('assets/pelanggan/' . $this->session->userdata('foto')); ?>" alt="" width="100px" height="100px">
            <!-- <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>assets/img/undraw_profile.svg" width="100px" height="100px"> -->
            <div class="mt-4 text-left large">
                <table>
                    <tr>
                        <td width="40%">Nama</td>
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

            </div>

        </div>

    </div>

    <h5 class="mt-2 text-center">Data Tagihan <?php echo $this->session->userdata('nama_pelanggan'); ?></h5>
    <?php foreach ($tagihan as $row) { ?>
        <div class="card mt-2 col-12 shadow-sm">
            <div class="card-body">
                <!-- <h5 class="card-title"></h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                <table>

                    <tr>
                        <td width="50%">KODE TAGIHAN</td>
                        <td>:</td>
                        <td width="100%"><?= $row->kode_tagihan ?></td>
                        
                    </tr>
                    <tr>
                        <td>NAMA PELANGGAN</td>
                        <td>:</td>
                        <td><?= $row->nama_pelanggan; ?></td>
                    </tr>
                    <tr>
                        <td>BULAN</td>
                        <td>:</td>
                        <td><?= $row->date_tagihan; ?></td>
                    </tr>
                    <tr>
                        <td>TOTAL TAGIHAN</td>
                        <td>:</td>
                        <td>Rp.<?= $row->total_tagihan ?> </td>
                        <td>
                <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        </div>
                        <input type="hidden" name="result_data" id="result-data" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" value="<?= $row->nama_pelanggan ?>" id="nama" hidden>
                        <input type="text" name="id_pelanggan" value="<?php echo $this->session->userdata('id_pelanggan'); ?>" id="id_pelanggan" hidden>
                        <input type="text" name="bayar" value="<?= $row->total_tagihan ?>" id="bayar" hidden>
                        <input type="text" name="bulan" value="<?= $row->date_tagihan ?>" id="bulan" hidden>
                        <input type="text" name="tagihan" value="TAGIHAN" id="tagihan" hidden>
                    </div>
                    <button id="pay-button" class="btn btn-primary">Bayar</button>
                </form>
        </td>
        </tr>
        <tr>


            <form action="" method="post">

            </form>

            </table>


</div>
</div>
<?php } ?>

<div class="card mt-2">
    <div class="card-body">

    </div>
</div>


<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var id_pelanggan = $('#id_pelanggan').val();
        var nama = $('#nama').val();
        var bayar = $('#bayar').val();
        var bulan = $('#bulan').val();
        var tagihan = $('#tagihan').val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/snap/token',
            data: {

                id_pelanggan: id_pelanggan,
                nama: nama,
                bayar: bayar,
                bulan: bulan,
                tagihan: tagihan
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>