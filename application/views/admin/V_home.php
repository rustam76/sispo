                <!-- Begin Page Content -->
                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="container-fluid">
                    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Selamat Datang</strong> <?php echo $this->session->userdata('username'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL PELANGGAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPelanggan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL BAYAR</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                TOTAL KARYAWAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKaryawan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status Pembayaran Pelanggan</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div> -->

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" id="dataTable" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Order ID</th>
                                                    <th>Nama</th>
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
                                                    <th>No</th>
                                                    <th>Order ID</th>
                                                    <th>Nama</th>
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
                                                foreach ($transaksi as $row) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $row->order_id; ?></td>
                                                        <td><?= $row->nama_pelanggan; ?></td>
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
                        </div>

                        <!-- Pie Chart -->
                        
                    </div>

                </div>