<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap5.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/registrasi.css'); ?>">


    <!-- font aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="imgae/ico" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <title>Registrasi</title>
</head>

<body>

    <div class="cont-login">
        <div class="cards">
            <div class="cont-img">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="">
            </div>
            <div class="content">
                <h3 class="text-center my-2">FORM REGISTRASI KARYAWAN</h3>
                <h3 class="text-center my-2">PT. MCA Indonesia</h3>
                <?php if ($this->session->flashdata('pesan')) : ?>
                    <p class="text-sm text-danger invalid text-center mt-4"><?= $this->session->flashdata('pesan') ?></p>
                <?php endif; ?>
                <form action="<?= base_url('Auth/daftar'); ?>" method="POST" id="myForm">
                    <div class="row">
                        <h4>Data Diri</h4>
                        <hr>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control txtinput" name="nama" autocomplete="off">
                                <small class="text-danger" hidden>Input hanya huruf</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="gender">
                                    <option disabled selected>--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control txtinput" name="tempat_lahir" autocomplete="off">
                                <small class="text-danger" hidden>Input hanya huruf</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No Telpon</label>
                                <input type="text" class="form-control number" name="no_telp">
                                <small class="text-danger" hidden>Input hanya angka</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <input type="text" class="form-control txtinput" name="alamat" autocomplete="off">
                                <small class="text-danger" hidden>Input hanya huruf</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                                <input type="text" class="form-control number" name="nik">
                                <small class="text-danger" hidden>Input hanya angka</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Posisi/Jabatan</label>
                                <select class="form-control" name="posisi">
                                    <option disabled selected>--Pilih Posisi/Jabatan--</option>
                                    <?php foreach ($posisi as $p) : ?>
                                        <option value="<?= $p['id_jabatan'] ?>"><?= $p['nama_jabatan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Agama</label>
                                <select class="form-control " name="agama">
                                    <option selected disabled>--Pilih Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
        
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Pembuatan Akun</h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" id="username" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="text" id="pw1" class="form-control" name="password1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Konfirmasi Password</label>
                                <input type="text" id="pw2" class="form-control" name="password2">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
                    <div class="mt-4 text-center">
                        <p>Sudah memiliki akun? <a href="<?= site_url('login') ?>">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/ajax.googleapis.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap5.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {

            $('.txtinput').on('keypress', function(event) {
                var charCode = event.which;
                if (charCode === 8 || charCode === 46 || charCode === 9 || charCode === 27 || charCode === 13 || charCode === 32) {
                    return;
                }
                if (charCode >= 48 && charCode <= 57) {
                    $(this).siblings('small').removeAttr('hidden')
                    event.preventDefault();
                }else{
                    $(this).siblings('small').attr('hidden', true)
                }
            });

            $('#myForm').submit(function(e) {
                e.preventDefault()
                var pw1 = $('#pw1').val()
                var pw2 = $('#pw2').val()
                var username = $('#username').val()
                var nama = $('[name=nama]').val()
                var gender = $('[name=gender]').val()
                var tempat_lahir = $('[name=tempat_lahir]').val()
                var no_telp = $('[name=no_telp]').val()
                var alamat = $('[name=alamat]').val()
                var nik = $('[name=nik]').val()
                var posisi = $('[name=posisi]').val()
                var tgl_lahir = $('[name=tgl_lahir]').val()
                var agama = $('[name=agama]').val()
                if (nama == null || nama == '' ||
                    gender == null || gender == '' ||
                    tempat_lahir == null || tempat_lahir == '' ||
                    no_telp == null || no_telp == '' ||
                    alamat == null || alamat == '' ||
                    nik == null || nik == '' ||
                    posisi == null || posisi == '' ||
                    tgl_lahir == null || tgl_lahir == '' ||
                    agama == null || agama == '' ||
                    username == null || username == '' ||
                    pw1 == null || pw1 == '' ||
                    pw2 == null || pw2 == ''
                ) {
                    Swal.fire({
                        title: "Data belum terisi semua",
                        text: "Silahkan cek kembali",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Oke!",
                    })
                } else {
                    if (pw1 != pw2) {
                        Swal.fire({
                            title: "Password Tidak Sesuai",
                            text: "Silahkan cek kembali",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Oke!",
                        })
                    } else {
                        this.submit()
                    }
                }
            })

            $('.number').keyup(function () {
                const res = this.value = this.value.replace(/[^0-9\.]/g,'');
            });
    

        })
    </script>



</body>

</html>