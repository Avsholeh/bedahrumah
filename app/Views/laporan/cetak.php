<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Laporan</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    td, th {
        padding: 0.5em;
        text-align: center;
    }
</style>
<body>
<h2>Data Permohonan</h2>
<table width="100%">
    <tr>
        <th>TANGGAL</th>
        <th>NAMA</th>
        <th>NO KTP</th>
        <th>NO KK</th>
        <th>JENIS KELAMIN</th>
        <th>ALAMAT</th>
        <th>STATUS</th>
    </tr>
    <?php foreach ($permohonans as $permohonan): ?>
        <tr>
            <td><?= Carbon::createFromFormat('Y-m-d H:i:s', $permohonan['tanggal'])->locale('id')->isoFormat('dddd, D MMMM YYYY'); ?></td>
            <td><?= $permohonan['nama'] ?></td>
            <td><?= $permohonan['no_ktp'] ?></td>
            <td><?= $permohonan['no_kk'] ?></td>
            <td><?= $permohonan['jenis_kelamin'] ?></td>
            <td><?= $permohonan['alamat'] ?></td>
            <td><?= $permohonan['status'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>