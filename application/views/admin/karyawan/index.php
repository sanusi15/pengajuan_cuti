<aside class="right-side">
    <?php if ($this->session->flashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    <?php endif; ?>
    <section class="content" id="content-add" style="display: none;">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <form id="myForm" action="<?= base_url('admin/addKaryawan'); ?>" method="POST">
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
                                            <input type="text" class="form-control" required name="nama" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>NIK :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <input type="text" class="form-control" required name="nik" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <select class="form-control " name="gender">
                                                <option selected disabled></option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Posisi/Jabatan :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <select class="form-control " name="jabatan">
                                                <option selected disabled></option>
                                                <?php foreach ($jabatan as $k) : ?>
                                                    <option value="<?= $k['id_jabatan']; ?>"> <?= $k['nama_jabatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input type="text" class="form-control" required name="tempat" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir :</label>
                                        <span class="text-muted font-italic">Format (mm-dd-YY)</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control" required name="tanggal" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>No Telp :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fax"></i>
                                            </div>
                                            <input type="text" class="form-control" required name="tlp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Agama :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-hospital-o"></i>
                                            </div>
                                            <select class="form-control " name="agama">
                                                <option selected disabled></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Alamat :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input type="text" class="form-control" required name="alamat" />
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
    <section class="content">
        <div style="display:flex; justify-content:space-between;align-items:center;">
            <div>
                <h3>Daftar Karyawan</h3>
            </div>
            <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                <div><button class="btn btn-primary" id="btn-add">Tambah Data</button></div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped example2">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nik</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Posisi/Jabatan</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Agama</th>
                                    <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($karyawan as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nama']; ?></td>
                                        <td><?= $d['nik']; ?></td>
                                        <td><?= $d['gender']; ?></td>
                                        <td><?= $d['nama_jabatan']; ?></td>
                                        <td><?= $d['tempat_lahir']; ?></td>
                                        <td><?= $d['tanggal_lahir']; ?></td>
                                        <td><?= strlen($d['alamat']) > 20 ? substr($d['alamat'], 0, 20) . '...' : $d['alamat'] ?></td>
                                        <td><?= $d['telp']; ?></td>
                                        <td><?= $d['agama']; ?></td>
                                        <?php if ($this->session->userdata('userdata')['level'] == 1) : ?>
                                            <td>
                                                <button class="btn-edit btn btn-primary" data-nik="<?= $d['nik']; ?>">Edit</button>
                                                <button class="btn btn-danger btn-hapus" data-nik="<?= $d['nik']; ?>">Hapus</button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#content-add').hide()
        $('#btn-add').click(function() {
            $('#myForm').attr('action', '<?= base_url('Admin/addKaryawan') ?>');
            $('#myForm').trigger('reset');
            $('.btn-add2').html('Simpan')
            $('#content-add').show()
        })
        $(document).delegate('.btn-edit','click', function() {
            const nik = $(this).data('nik')
            $('#myForm').attr('action', '<?= base_url('Admin/editKaryawan') ?>');
            $.ajax({
                method: 'POST',
                url: '<?= base_url('Admin/jgetKaryawan') ?>',
                data: {
                    nik: nik
                },
                success: function(response) {
                    const res = JSON.parse(response)
                    $('[name="id"]').val(res.id_karyawan)
                    $('[name="nama"]').val(res.nama)
                    $('[name="nik"]').val(res.nik)
                    $('[name="gender"]').val(res.gender)
                    $('[name="jabatan"]').val(res.id_jabatan)
                    $('[name="tempat"]').val(res.tempat_lahir)
                    $('[name="tanggal"]').val(res.tanggal_lahir)
                    $('[name="tlp"]').val(res.telp)
                    $('[name="agama"]').val(res.agama)
                    $('[name="alamat"]').val(res.alamat)
                    $('.btn-add2').text('Update')
                    $('#content-add').show()
                }
            })
        })
        $(document).delegate('.btn-hapus', 'click', function(e) {
            console.log('hapus')
            e.preventDefault()
            let href = $(this).attr('href');
            const nik = $(this).data('nik')
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data ini akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '<?= base_url('Admin/deleteKaryawan') ?>',
                        data: {
                            nik: nik
                        },
                        success: function(res) {
                            if (res == 'sukses') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                            setTimeout(() => {
                                window.location.reload()
                            }, 2000);
                        }
                    })
                }
            });
        })
    })
</script>