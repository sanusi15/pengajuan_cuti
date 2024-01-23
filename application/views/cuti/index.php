<aside class="right-side">
    <section class="content" id="content-add">
        
        <h3>Form Pengajuan Cuti</h3>
        <div class="row">
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <form id="myForm" action="<?= base_url('cuti/pengajuan'); ?>" method="POST">
                        <div class="box-body">
                            <input type="hidden" value="" name="id">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Nama :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <input type="text" disabled class="form-control" value="<?= $user['nama']; ?>" required name="nama" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Cuti :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <select class="form-control " name="jenis">
                                                <option selected disabled></option>
                                                <?php foreach ($jenis_cuti as $k) : ?>
                                                    <option value="<?= $k['id_jeniscuti']; ?>"> <?= $k['nama_cuti']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Dari Tanggal :</label>
                                        <span class="text-muted font-italic">Format (mm-dd-YY)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control" required name="tgl_mulai" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Sampai Tanggal :</label>
                                        <span class="text-muted font-italic">Format (mm-dd-YY)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control" required name="tgl_selesai" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk:</label>
                                        <span class="text-muted font-italic">Format (mm-dd-YY)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control" required name="tgl_masuk" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Alasan Cuti :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input type="text" class="form-control" required name="keterangan" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-add2" style="width:100%">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>