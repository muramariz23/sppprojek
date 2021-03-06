<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url('assets/CoolAdmin-master/images/icon/logo.png'); ?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php if ($this->session->userdata('akses') == 'admin') : ?>

                    <li class="active has-sub">
                        <a class="js-arrow" href="<?php echo site_url('admin/overview') ?>">
                            <i class="fas fa-tachometer-alt"></i>Beranda</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/spp') ?>">
                            <i class="fas fa-chart-bar"></i>SPP</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/kompetensi_keahlian') ?>">
                            <i class="fas fa-chart-bar"></i>Kompetensi Keahlian</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/kelas') ?>">
                            <i class="fas fa-table"></i>Kelas</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/siswa') ?>">
                            <i class="far fa-check-square"></i>Siswa</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/petugas') ?>">
                            <i class="fas fa-calendar-alt"></i>Petugas</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/pembayaran') ?>">
                            <i class="fas fa-calendar-alt"></i>Transaksi Pembayaran</a>
                    </li>


                    <!-- Akses Menu Untuk Petugas -->
                <?php elseif ($this->session->userdata('akses') == 'petugas') : ?>

                    <li class="active has-sub">
                        <a class="js-arrow" href="<?php echo site_url('admin/overview') ?>">
                            <i class="fas fa-tachometer-alt"></i>Beranda</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/spp') ?>">
                            <i class="fas fa-chart-bar"></i>SPP</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/siswa') ?>">
                            <i class="far fa-check-square"></i>Siswa</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/pembayaran') ?>">
                            <i class="fas fa-calendar-alt"></i>Transaksi Pembayaran</a>
                    </li>

                    <!-- Akses Menu Untuk Siswa -->
                <?php else : ?>

                    <li class="active has-sub">
                        <a class="js-arrow" href="<?php echo site_url('admin/overview') ?>">
                            <i class="fas fa-tachometer-alt"></i>Beranda</a>
                    </li>

                <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->