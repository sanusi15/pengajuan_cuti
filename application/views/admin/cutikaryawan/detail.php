<style>
    .val {
        font-weight: bold;
        width: 40%;
    }

    .eq {
        padding: 5px 10px;
        width: 2%;
    }

    .key {
        width: 5%;
    }
</style>
<aside class="right-side">
    <section class="content">
        <h3>Detail Cuti Karyawan</h3>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary" style="padding: 10px;">
                    <table class="">
                        <tr>
                            <td class="key">Nama Karyawan</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['nama']; ?></td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Pengajuan Cuti</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['tgl']; ?></td>
                        </tr>
                        <tr>
                            <td class="key">Jenis Cuti</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['nama_cuti']; ?></td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Mulai</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['tgl_mulai']; ?></td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Selesai</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['tgl_selesai']; ?></td>
                        </tr>
                        <tr>
                            <td class="key">Lama Cuti</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['lama_cuti']; ?> Hari</td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Masuk</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['tgl_masuk']; ?> </td>
                        </tr>
                        <tr>
                            <td class="key">Keterangan</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['keterangan']; ?> </td>
                        <tr>
                            <td class="key">Status</td>
                            <td class="eq">:</td>
                            <td class="val">
                                <?php if ($cuti['status'] == 'Pending') : ?>
                                    <span style="background: #F39C12; padding:5px 20px; color: #fff; border-radius:2px;">
                                        <?= $cuti['status']; ?>
                                    </span>
                                <?php elseif ($cuti['status'] == 'Diterima') : ?>
                                    <span style="background: #00A65A; padding:5px 20px; color: #fff; border-radius:2px;">
                                        <?= $cuti['status']; ?>
                                    </span>
                                <?php else : ?>
                                    <span style="background: #F56954; padding:5px 20px; color: #fff; border-radius:2px;">
                                        <?= $cuti['status']; ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="key">Alasan</td>
                            <td class="eq">:</td>
                            <td class="val"><?= $cuti['alasan']; ?> </td>
                        </tr>
                    </table>
                    <hr>
                    <p>Tanggapi</p>
                    <form action="<?= base_url('admin/konfirmasi'); ?>" method="POST">
                        <input type="hidden" value="<?= $cuti['id_cuti']; ?>" name="id">
                        <input type="hidden" value="<?= $cuti['nik']; ?>" name="id_karyawan">
                        <input type="hidden" value="<?= $cuti['lama_cuti']; ?>" name="lama_cuti">
                        <input type="hidden" value="<?= $cuti['id_jeniscuti']; ?>" name="jenis_cuti">
                        <textarea required class="form-control" name="alasan" id="alasan" cols="30" rows="5"></textarea>
                        <a href="<?= base_url('admin/cutiKaryawan/all'); ?>" class="btn btn-primary" style="margin: 20px 10px; float:right; text-decoration:none;">Kembali</a>
                        <button name="submit" value="Ditolak" class="btn btn-danger" style="margin: 20px 5px; float:right">Tolak</button>
                        <button name="submit" value="Diterima" class="btn btn-success" style="margin: 20px 5px; float:right">Terima</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>