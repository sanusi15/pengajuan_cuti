<aside class="right-side">
    <section class="content" id="content-add">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <form id="myForm" action="<?= base_url('admin/addJenisCuti'); ?>" method="POST">
                        <div class="box-body">
                            <input type="hidden" value="" name="id">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Cuti :</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                            <input type="text" class="form-control" required name="nama" />
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
     <?php if ($this->session->flashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    <?php endif; ?>
     <?php if ($this->session->flashdata('msg2')) : ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('msg2'); ?>
        </div>
    <?php endif; ?>
    <section class="content">
        <div style="display:flex; justify-content:space-between;align-items:center;">
            <div>
                <h3>Daftar Jenis Cuti</h3>
            </div>
            <div><button class="btn btn-primary" id="btn-add">Tambah Data</button></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($cuti as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nama_cuti']; ?></td>
                                        <td>
                                            <button class="btn-edit btn btn-primary" data-id="<?= $d['id_jeniscuti']; ?>">Edit</button>
                                            <button class="btn btn-danger btn-hapus" data-id="<?= $d['id_jeniscuti']; ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
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
            $('#myForm').attr('action', '<?= base_url('Admin/addJenisCuti') ?>');
            $('#myForm').trigger('reset');
            $('.btn-add2').html('Simpan')
            $('#content-add').show()
        })
        $(document).delegate('.btn-edit', 'click', function() {
            const id = $(this).data('id')
            $('#myForm').attr('action', '<?= base_url('Admin/editJenisCuti') ?>');
            $.ajax({
                method: 'POST',
                url: '<?= base_url('Admin/jgetJenisCuti') ?>',
                data: {
                    id: id
                },
                success: function(response) {
                    const res = JSON.parse(response)
                    $('[name="id"]').val(res.id_jeniscuti)
                    $('[name="nama"]').val(res.nama_cuti)
                    $('.btn-add2').text('Update')
                    $('#content-add').show()
                }
            })
        })
        $(document).delegate('.btn-hapus', 'click', function(e) {
            e.preventDefault()
            const id = $(this).data('id')
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
                        url: '<?= base_url('Admin/deleteJenisCuti') ?>',
                        data: {
                            id: id
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