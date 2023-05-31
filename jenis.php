<?php
// membuat instance
$dataJenis=NEW Jenis;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<div class="container"></br>
<h3>Daftar Bansos</h3>
<table border="1" width="100%" class="table table-striped">
<thead>
<a href="index.php?file=jenis&aksi=tambah"class="btn btn-primary btn-sm">Tambah Tipe Bansos</a>
<div class="d-flex flex-row-reverse bd-highlight">

<th>No.</th>
<th>Kode Bansos</th>
<th>Tipe Bantuan</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataJenis->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisJenis){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisJenis->kode_bansos.'</td>
<td>'.$barisJenis->tipe_bantuan.'</td><td>
<a class="btn btn-primary btn-sm"
href="index.php?file=jenis&aksi=edit&kode_bansos='.$barisJenis->kode_bansos.'">Edit</a>
<a class="btn btn-primary btn-sm"
href="index.php?file=jenis&aksi=hapus&kode_bansos='.$barisJenis->kode_bansos.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<center><h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"
action="index.php?file=jenis&aksi=simpan">';
$html .='<p>Kode Bansos<br/>';
$html .='<input type="text" name="txtKode"
placeholder="Masukan No Kode" autofocus/></p>';
$html .='<p>Tipe Bansos<br/>';
$html .='<input type="text" name="txtTipe"
placeholder="Masukan Tipe Bansos" size="30" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"
value="Simpan"/></p></center>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'kode_bansos'=>$_POST['txtKode'],
'tipe_bantuan'=>$_POST['txtTipe'],
);
// simpan siswa dengan menjalankan method simpan
$dataJenis->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jenis&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$jenis_bansos=$dataJenis->detail($_GET['kode_bansos']);

    $html =null;
    $html .='<center><h3>Form Tambah</h3>';
    $html .='<p>Silahkan masukan form </p>';
    $html .='<form method="POST"
    action="index.php?file=jenis&aksi=update">';
    $html .='<p>Kode Bansos<br/>';
    $html .='<input type="text" name="txtKode"
    value="'.$jenis_bansos->kode_bansos.'" placeholder="Masukan Kode bansos"
    readonly/></p>';
    $html .='<p>Tipe Bantuan<br/>';
    $html .='<input type="text" name="txtTipe"
    value="'.$jenis_bansos->tipe_bantuan.'" placeholder="Masukan Tipe Bantuan"
    size="30" required autofocus/></p>';
    $html .='<p><input type="submit" name="tombolSimpan"
    value="Simpan"/></p></center>';
    $html .='</form>';
    echo $html;
    }
    // aksi tambah data
    else if ($_GET['aksi']=='update') {
    $data=array(
        'kode_bansos'=>$_POST['txtKode'],
        'tipe_bantuan'=>$_POST['txtTipe'],
);
$dataJenis->update($_POST['txtKode'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jenis&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataJenis->hapus($_GET['kode_bansos']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jenis&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>