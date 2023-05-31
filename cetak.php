<!DOCTYPE html>
<html>
<head>
 <title>CETAK PRINT</title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
 <table>
 <tr>
 <th>Id Bantuan</th>
 <th>Nama Penerima Bantuan</th>
 <th>Alamat</th>
 <th>Jenis Bantuan</th>
 <th>Jumlah Bantuan</th>
 <th>Tanggal Bantuan</th>
 </tr>
 <?php 
 // koneksi database
 $koneksi = mysqli_connect("localhost","root","","db_bansos");

 // menampilkan data pegawai
 $data = mysqli_query($koneksi,"select * from bansos");
 while($d = mysqli_fetch_array($data))
 
 {
 ?>
 <tr>
 <td style='text-align: center;'><?php echo $d['id_bantuan'] ?></td>
 <td><?php echo $d['nama']; ?></td>
 <td><?php echo $d['alamat']; ?></td>
 <td><?php echo $d['jenis_bantuan']; ?></td>
 <td><?php echo $d['jumlah_bantuan']; ?></td>
 <td><?php echo $d['tanggal_bantuan']; ?> </td>
 </tr>
 <?php 
 }
 ?>
    </table>
    <script>
 window.print();
 </script>
</body>
</html>