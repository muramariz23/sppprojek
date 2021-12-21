
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
<div class="card mb-3">
    <div class="card-header" style="margin-top: 50px;">
         <a class="btn btn-outline-primary" href="<?php echo site_url('admin/petugas/add') ?>">
                <i class="fa fa-plus" aria-hidden="true"></i>
            Tambah
        </a>
                    </div>
                    <div class="card bg-light ">
    <div class="card-body">
               <table id="example" class="table table-striped table-bordered" style="width:100%; background-color:aliceblue;">
            <thead>
                <tr>
                    <th style="width: 500px;">Nama Petugas</th>
                    <th style="width: 150px;">Foto</th>
                    <th class="text-center" style="width: 500px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($GetPetugas)) {
                    foreach ($GetPetugas as $GetR) {
                ?>
                        <tr>

                            <td><?php echo $GetR->nama_petugas; ?></td>
                            <td><img src="<?php echo base_url('assets/img/') . $GetR->image;  ?>" style="width: 50px; height:50px;"></td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" href="<?php echo site_url('admin/petugas/edit/') . $GetR->id_petugas ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit
                                </a>
                                <a class="btn btn-outline-danger" onclick="return deleteConfirm('<?php echo site_url('admin/petugas/delete/') . $GetR->id_petugas ?>')" href="#!">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Hapus
                                </a>
                            </td>

                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
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




 <script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>
</body>

</html>
<!-- end document-->



