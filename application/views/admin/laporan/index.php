<aside class="right-side">
    <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <form action="<?= base_url('laporan/cari'); ?>" method="POST">
                        <div class="box-body">
                            <div class="row">
                                <?php if ($this->session->flashdata('msg')) : ?>
                                    <?php if ($this->session->flashdata('msg') == 'Laporan Gagal Dikirim') : ?>
                                        <div class="alert alert-danger">
                                            <?= $this->session->flashdata('msg'); ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-success">
                                            <?= $this->session->flashdata('msg'); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Pilih Tanggal Laporan:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation" name="tgl" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary " type="submit" style="width:100%">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content" id="content2" style="display: none;">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <form action="<?= base_url('laporan/kirim'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bulan">Bulan:</label>
                                                <select name="bulan" id="bulan" class="form-control">
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="Septermber">Septermber</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun">Tahun:</label>
                                                <select name="tahun" id="tahun" class="form-control">
                                                    <?php
                                                    $currentYear = date('Y');
                                                    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                                                        echo "<option value=\"$i\">$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Pilih File Laporan:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input type="file" class="form-control " id="reservation" name="file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary " type="submit" style="width:100%">Kirim Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div style="display: flex; justify-content: space-between; align-items:center;">
                    <h3>Riwayat Laporan Bulanan</h3>
                    <div class="">
                        <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                        <button id="btn-upload" class="btn btn-primary">Upload Laporan</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tanggal Pelaporan</th>
                                        <th>Laporan Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($laporan as $d) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $d['tgl_pelaporan']; ?></td>
                                            <td><?= $d['periode_laporan']; ?></td>
                                            <td>
                                                <a href="<?= base_url('assets/upload/file/'.$d['file']); ?>" download class="btn btn-success"><i class="fa fa-download"></i> Download File</a>
                                                <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                                                <a href="<?= base_url('laporan/delete/'.$d['id_laporan']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tanggal Pelaporan</th>
                                        <th>Laporan Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn-upload').click(function() {
            $('#content2').removeAttr('style')
        })
    })
</script>