<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        .table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        #table th {
            border: 1px solid #ddd;
            padding: 2px;
        }


        .table th {
            color: white;
        }

        .tocenter {
            text-align: center;
        }

        .pl {
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .txtsmall {
            font-size: 11px;
        }

        .tableFoot {
            position: absolute;
            bottom: 0;
            margin-bottom: 120px;
        }

        .tableFoot tr {
            text-align: center;
        }

        .tableFoot tr td:nth-child(2) {
            padding-bottom: 80px;
        }
    </style>
</head>

<body>
    <div style="position: relative;">
        <table class="tableHead" width="100%">
            <tr>
                <td rowspan="2" width="10%">
                    <img src="<?= base_url('assets/img/logo.png'); ?>" height="50px" alt="logo">
                </td>
                <td width="90%" colspan="3" class="tocenter tittle">Laporan Pengajuan Cuti Karyawan <br>PT. MCA INDONESIA</td> 
            </tr>
            <tr>
                <td colspan="3" class="tocenter txtsmall">Tanggal :<?= $date1; ?> s/d <?= $date2; ?></td>
            </tr>
            <tr>
                <td colspan="4" height="10px"></td>
            </tr>
        </table>
        <table class="table" width="100%">
            <tr>
                <td class="tocenter txtsmall">No</td>
                <td class="tocenter txtsmall">Nama</td>
                <td class="tocenter txtsmall">NIK</td>
                <td class="txtsmall">Jabatan</td>
                <td class="tocenter txtsmall">Jenis Cuti</td>
                <td class="tocenter txtsmall">Tanggal Pengajuan</td>
                <td class="tocenter txtsmall">Tanggal Mulai</td>
                <td class="tocenter txtsmall">Tanggal Selesai</td>
                <td class="tocenter txtsmall">Lama Cuti</td>
                <td class="tocenter txtsmall">Status</td>
            </tr>
            <?php $i = 1;
            foreach ($daftar as $d) : ?>
                <tr>
                    <td class="tocenter txtsmall"><?= $i++; ?></td>
                    <td class="txtsmall"><?= $d['nama']; ?></td>
                    <td class="txtsmall"><?= $d['nik']; ?></td>
                    <td class="txtsmall"><?= $d['nama_jabatan']; ?></td>
                    <td class="txtsmall"><?= $d['nama_cuti']; ?></td>
                    <td class="tocenter txtsmall"><?= $d['tgl']; ?></td>
                    <td class="tocenter txtsmall"><?= $d['tgl_mulai']; ?></td>
                    <td class="tocenter txtsmall"><?= $d['tgl_selesai']; ?></td>
                    <td class="tocenter txtsmall"><?= $d['lama_cuti']; ?> Hari</td>
                    <td class="tocenter txtsmall"><?= $d['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table class="tableFoot" width="100%">
            <tr>
                <td>Disetujui</td>
                <td></td>
                <td>Mengetahui</td>
            </tr>
            <tr>
                <td><div>HRD</div> Amirudin</td>
                <td></td>
                <td><div>Manager</div> Amirudin</td>
            </tr>
        </table>
    </div>
</body>

</html>