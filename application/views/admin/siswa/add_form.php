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
                                    <a class="btn btn-outline-primary" href="<?php echo site_url('admin/siswa/') ?>">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">NISN*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('nisn') ? 'is-invalid' : '' ?>" id="staticEmail" name="nisn" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nisn') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">NIS*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('nis') ? 'is-invalid' : '' ?>" id="staticEmail" name="nis" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nis') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="staticEmail" name="nama" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kelas*</label>
                                        <div class="col-sm-10">
                                            <select class="form-control <?php echo form_error('id_kelas') ? 'is-invalid' : '' ?>" name="id_kelas" required>
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach ($GetKelas as $GetR) : ?>
                                                    <option value="<?php echo $GetR->id_kelas; ?>"><?php echo $GetR->nama_kelas; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('id_kelas') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Alamat*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="staticEmail" name="alamat" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tahun') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">No Telepon*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo form_error('no_telp') ? 'is-invalid' : '' ?>" id="staticEmail" name="no_telp" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tahun') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Tahun SPP*</label>
                                        <div class="col-sm-10">
                                            <select class="form-control <?php echo form_error('id_spp') ? 'is-invalid' : '' ?>" name="id_spp" required>
                                                <option value="">Pilih Tahun</option>
                                                <?php foreach ($GetSpp as $GetR) : ?>
                                                    <option value="<?php echo $GetR->id_spp; ?>"><?php echo $GetR->tahun; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tahun') ?>
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
