
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php $this->load->view("admin/_partials/navbar.php") ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="card mb-3">
                        <div class="card-header">
                             <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
                   
                      <div class="card bg-light ">
   <form action="" method="POST">
        <div class="card-header">
            <a class="btn btn-outline-primary" href="<?php echo site_url('admin/pembayaran/') ?>">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Petugas*</label>
                <div class="col-sm-10">
                    <select class="form-control <?php echo form_error('id_petugas') ? 'is-invalid' : '' ?>" name="id_petugas" required>
                        <option value="">Pilih Petugas</option>
                        <?php foreach ($GetPetugas as $GetR) : ?>
                            <option value="<?php echo $GetR->id_petugas; ?>"><?php echo $GetR->nama_petugas; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('id_petugas') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Siswa*</label>
                <div class="col-sm-10">
                    <select class="form-control <?php echo form_error('nisn') ? 'is-invalid' : '' ?>" name="nisn" required>
                        <option value="">Pilih Siswa</option>
                                                <?php foreach ($GetSiswa as $GetR) : ?>
                            <option value="<?php echo $GetR->nisn; ?>"><?php echo $GetR->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="invalid-feedback">
                     <?php echo form_error('nisn') ?>
                </div>
             </div>
             <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Bayar*</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control <?php echo form_error('tgl_bayar') ? 'is-invalid' : '' ?>" id="staticEmail" name="tgl_bayar" required>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('tgl_bayar') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bulan Bayar*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('bulan_bayar') ? 'is-invalid' : '' ?>" id="staticEmail" name="bulan_bayar" required>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('bulan_bayar') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Bayar*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('tahun_bayar') ? 'is-invalid' : '' ?>" id="staticEmail" name="tahun_bayar" required>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('tahun_bayar') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nominal*</label>
                <div class="col-sm-10">
                    <select class="form-control <?php echo form_error('id_spp') ? 'is-invalid' : '' ?>" name="id_spp" required>
                        <option value="">Pilih Nominal</option>
                        <?php foreach ($GetSpp as $GetR) : ?>
                            <option value="<?php echo $GetR->id_spp; ?>"><?php echo $GetR->nominal; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('id_spp') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Bayar*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo form_error('jumlah_bayar') ? 'is-invalid' : '' ?>" id="staticEmail" name="jumlah_bayar" required>
                </div>
                <div class="invalid-feedback">
                                            <?php echo form_error('jumlah_bayar') ?>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
        </div>
    </form>
</div>
                    <?php $this->load->view("admin/_partials/footer.php") ?>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <?php $this->load->view("admin/_partials/js.php") ?>
    <!-- <?php //$this->load->view("admin/_partials/scrolltop.php") ?>
     --><?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
<!-- end document-->
