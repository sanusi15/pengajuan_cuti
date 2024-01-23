<aside class="right-side">
    <section class="content">
        <h3>Riwayat Cuti Anda</h3>
        <?php if ($this->session->flashdata('msg')) : ?>
            <div class="btn btn-warning" style="margin-bottom: 20px; float: right;" role="alert">
                <?= $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Cuti</th>
                                    <th>Dari Tanggal</th>
                                    <th>Sampai Tanggal</th>
                                    <th>Alasan Cuti</th>
                                    <th>Keterangan HRD</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($jml_cuti as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['tgl']; ?></td>
                                        <td><?= $d['nama_cuti']; ?></td>
                                        <td><?= $d['tgl_mulai']; ?></td>
                                        <td><?= $d['tgl_selesai']; ?></td>
                                        <td><?= strlen($d['keterangan']) > 20 ? substr($d['keterangan'], 0, 20) . '...' : $d['keterangan'] ?></td>
                                        <td><?= strlen($d['alasan']) > 20 ? substr($d['alasan'], 0, 20) . '...' : $d['alasan'] ?></td>

                                        <td style="display: flex; justify-content: center; align-items:center">
                                            <?php if ($d['status'] == 'Pending') : ?>
                                                <span style="background: #F39C12; padding:5px 20px; color: #fff; border-radius:2px;">
                                                    Menunggu
                                                </span>
                                            <?php elseif ($d['status'] == 'Diterima') : ?>
                                                <span style="background: #00A65A; padding:5px 20px; color: #fff; border-radius:2px;">
                                                    <?= $d['status']; ?>
                                                </span>
                                            <?php else : ?>
                                                <span style="background: #F56954; padding:5px 20px; color: #fff; border-radius:2px;">
                                                    <?= $d['status']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jenis Cuti</th>
                                    <th>Dari Tanggal</th>
                                    <th>Sampai Tanggal</th>
                                    <th>Alasan Cuti</th>
                                    <th>Keterangan HRD</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>