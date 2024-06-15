<aside class="right-side">
    <section class="content">
        <?php if ($this->session->flashdata('msg')) : ?>
            <div class="btn btn-warning" style="margin-bottom: 20px; float: right;" role="alert">
                <?= $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <h3>Profile Karyawan</h3>
        <div class="row">
            <div class="col-md-6 col-lg-4" id="content1">
                <div class="box box-primary">
                    <div class="box-body card">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="<?= base_url('assets/img/user.png') ?>" class="img-circle" alt="User Image" width="100" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" disabled value="<?= $user['nama']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="">Level</label>
                                <input type="text" class="form-control" disabled value="<?= $level; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <button class="btn btn-primary" id="btn-ubahProfile" style="width: 100%; margin-top: 20px;">Ubah Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-8" id="content2" style="display: none;">
                <div class="box box-success">
                    <div class="box-body card">
                        <form action="<?= base_url('admin/editProfile'); ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama">
                                </div>
                                <div class="col-md-6">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" value="<?= $user['nik']; ?>" name="nik">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="gender" id="" class="form-control" name="gender">
                                        <option <?= ($user['gender'] == 'Laki-Laki') ? 'selected' : ''; ?> value="Laki-Laki">Laki-Laki</option>
                                        <option <?= ($user['gender'] == 'Perempuan') ? 'selected' : ''; ?> value="Peerempaun">Peerempaun</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Agama</label>
                                    <select name="agama" id="" class="form-control" name="agama">
                                        <option <?= ($user['agama'] == 'Islam') ? 'selected' : ''; ?> value="Islam">Islam</option>
                                        <option <?= ($user['agama'] == 'Kristen') ? 'selected' : ''; ?> value="Kristen">Kristen</option>
                                        <option <?= ($user['agama'] == 'Hindu') ? 'selected' : ''; ?> value="Hindu">Hindu</option>
                                        <option <?= ($user['agama'] == 'Buddha') ? 'selected' : ''; ?> value="Buddha">Buddha</option>
                                        <option <?= ($user['agama'] == 'Katolik') ? 'selected' : ''; ?> value="Katolik">Katolik</option>
                                        <option <?= ($user['agama'] == 'Khonghucu') ? 'selected' : ''; ?> value="Khonghucu">Khonghucu</option>
                    
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="<?= $user['tempat_lahir']; ?>" name="tempat">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?= $user['tanggal_lahir']; ?>" name="tanggal">
                                </div>
                                <div class="col-md-6">
                                    <label for="">No Telp</label>
                                    <input type="text" class="form-control" value="<?= $user['telp']; ?>" name="tlp">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" value="<?= $user['alamat']; ?>" name="alamat">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" value="<?= $user2['username']; ?>" name="username">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Password </label><span class="text-danger" style="font-size:10px;font-style:italic;margin-left: 10px;">Kosongkan jika tidak diubah</span>
                                    <input type="password" class="form-control" name="password">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <button class="btn btn-success" style="width: 100%; margin-top: 20px;">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content2').hide()
        $('#btn-ubahProfile').click(function() {
            $('#content2').show()
        })       
    })
</script>