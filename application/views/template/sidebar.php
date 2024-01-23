<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/img/user.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('userdata')['nama'] ?></p>
                <p>Hello, happy working</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php if ($this->session->userdata('userdata')['level'] == 0) : ?>
                <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                <li class="treeview <?= ($this->uri->segment(2) == 'karyawan' || $this->uri->segment(2) == 'jeniscuti' || $this->uri->segment(2) == 'jabatan') ? 'active' : '' ?>">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Input Data</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/karyawan'); ?>"><i class="fa fa-angle-double-right"></i> Data Karyawan</a></li>
                        <li><a href="<?= base_url('admin/jeniscuti'); ?>"><i class="fa fa-angle-double-right"></i> Jenis Cuti</a></li>
                        <li><a href="<?= base_url('admin/jabatan'); ?>"><i class="fa fa-angle-double-right"></i> Posisi/Jabatan</a></li>
                    </ul>
                </li>
                <li class="treeview <?= ($this->uri->segment(1) == 'cutiKaryawan' || $this->uri->segment(1) == 'rekapnonkomersil') ? 'active' : '' ?>">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Info Cuti</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/cutiKaryawan/all'); ?>"><i class="fa fa-angle-double-right"></i> Daftar Cuti Karyawan</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('userdata')['level'] == 2) : ?>
                <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/karyawan'); ?>">
                        <i class="fa fa-users"></i> <span>Data Karyawan</span>
                    </a>
                </li>
            <?php endif; ?>


            <?php if ($this->session->userdata('userdata')['level'] == 0) : ?>
                <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('pengajuan_cuti'); ?>">
                        <i class="fa fa-send"></i> <span>Pengajuan Cuti</span>
                    </a>
                </li>

                <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('karyawan/riwayat'); ?>">
                        <i class="fa fa-history"></i> <span>Riwayat Cuti</span>
                    </a>
                </li>
            <?php endif; ?>

            <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/profile'); ?>">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>

            <?php if ($this->session->userdata('userdata')['level'] == 1 || $this->session->userdata('userdata')['level'] == 2) : ?>
                <li class="<?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('laporan'); ?>">
                        <i class="fa fa-print"></i> <span>Laporan</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="">
                <a href="<?= base_url('logout'); ?>">
                    <i class="fa fa-sign-out"></i> <span>Log Out</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>