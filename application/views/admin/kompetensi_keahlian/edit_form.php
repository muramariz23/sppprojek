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
                   
                        <div class="card mb-3">
                        <div class="card-header">
                        <a href="<?php echo site_url('admin/kompetensi_keahlian/') ?>"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php base_url("admin/kompetensi_keahlian/edit") ?>" method="post"
                            enctype="multipart/form-data" >

                            <input type="hidden" name="id" value="<?php echo $kk->id_kk?>" />

                            <div class="form-group">
                                <label for="nama_kk">Nama Kompetensi Keahlian</label>
                                <input class="form-control <?php echo form_error('nama_kk') ? 'is-invalid':'' ?>"
                                 type="text" name="nama_kk" placeholder="Nama Kompetensi Keahlian" value="<?php echo $kk->nama_kk ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_kk') ?>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </form>
                        </div>
                        <div class="card-footer small text-muted">
                            * required fields
                        </div>
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
