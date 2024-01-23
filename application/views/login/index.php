<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap5.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">


    <!-- font aswome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="imgae/ico" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <title>Login</title>
</head>

<body>
    <div class="flashdata" data-flash="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="cont-login">
        <div class="cards">
            <div class="cont-img">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="">
            </div>
            <div class="content">
                <h3 class="text-center my-2">Aplikasi Pengajuan Cuti Pegawai</h3>
                <h3 class="text-center my-2">PT. MCA Indonesia</h3>
                <?php if ($this->session->flashdata('pesan')) : ?>
                    <p class="text-sm text-danger invalid text-center mt-4"><?= $this->session->flashdata('pesan') ?></p>
                <?php endif; ?>
                <form action="<?= base_url('signIn'); ?>" method="POST">
                    <div class="mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary w-100 btn-login">Login</button>
                    </div>
                    <div class="mt-4">
                        <p>Belum memiliki akun? <a href="<?= site_url('registrasi') ?>">Registrasi</a></p>
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
            const flashdata = $('.flashdata').data('flash')
            if (flashdata != '') {
                Swal.fire({
                    title: flashdata,
                    text: "Silahkan Login",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Oke!",
                })
            }
        })
    </script>



</body>

</html>