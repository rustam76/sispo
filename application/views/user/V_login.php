<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>From Login TV Kabel</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<style></style>
</head>

<body class="bg-gradient-primary">

    <div class="container">
    

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
               
                        <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-gray-900">Login</h1>
                                        <p class="">Selamat Datang User</p>
                                    </div>
                                   
                                    <?= form_open('AuthUser/Login') ?>
                                        <div class="form-group">
                                            <input type="text" name="nama_pelanggan" class="form-control form-control-user"
                                                placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                       
                                        
                                 <?= form_close() ?>
                              
                                    </div>
                                    <div class="text-center">
                                        <p class="">Web Penagihan TV Kabel Online PT. Media Educativ Vision</p>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweet/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/myjs.js"></script>


<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'warning',
            title: 'Salah',
            text: flash,
           
        })
    }

    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Ingin Menghapus Data ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                    window.location = link;
            }
        })
    })
</script>

</body>

</html>