<?php
// membuat instance
$dataBansos=NEW Bansos;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<div class="container"></br>
<h3>Daftar Bansos</h3>
<table border="1" width="100%" class="table table-striped">
<thead>
<a href="index.php?file=bansos&aksi=tambah"class="btn btn-primary btn-sm">Tambah Data Bansos</a>
<div class="d-flex flex-row-reverse bd-highlight">
  <div class="bd-highlight">
  <a class="btn btn-primary btn-sm" target="_blank" href="cetak.php">PRINT</a>
  </div>
</div>

<th>No.</th>
<th>Id bantuan</th>
<th>Nama</th>
<th>Alamat</th>
<th>Jenis Bantuan</th>
<th>Jumlah Bantuan</th>
<th>Tanggal Bantuan</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataBansos->tampil();
$no=null;
if(isset($data)){
foreach($data as $BarisBansos)

{
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$BarisBansos->id_bantuan.'</td>
<td>'.$BarisBansos->nama.'</td>
<td>'.$BarisBansos->alamat.'</td>
<td>'.$BarisBansos->jenis_bantuan.'</td>
<td>'.$BarisBansos->jumlah_bantuan.'</td>
<td>'.$BarisBansos->tanggal_bantuan.'</td>
<td>
<a class="btn btn-primary btn-sm"
href="index.php?file=bansos&aksi=edit&id_bantuan='.$BarisBansos->id_bantuan.'">Edit</a>
<a class="btn btn-primary btn-sm"
href="index.php?file=bansos&aksi=hapus&id_bantuan='.$BarisBansos->id_bantuan.'">Hapus</a>   
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
action="index.php?file=bansos&aksi=simpan">';
$html .='<p>Nomor Id Bantuan<br/>';
$html .='<input type="text" name="txtId"
placeholder="Masukan Id Bantuan" autofocus/></p>';
$html .='<p>Nama Penerima Bantuan<br/>';
$html .='<input type="text" name="txtNama"
placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Alamat<br/>';
$html .='<input type="text" name="txtAlamat"
placeholder="Masukan Alamat" size="30" required/>,';
$html .='<p>Jenis Bantuan<br/>';
$html .='<input type="radio" name="txtJb"
value="Uang"> Uang';
$html .='<input type="radio" name="txtJb"
value="Sembako">Sembako</p>';
$html .='<p>Jumlah Bantuan<br/>';
$html .='<input type="text" name="txtJml"
placeholder="Masukan Jumlah Bantuan" size="30" required/></p>';
$html .='<p>Tanggal Bantuan<br/>';
$html .='<input type="date" name="txtTanggal"
required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"
value="Simpan"/></p></center>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_bantuan'=>$_POST['txtId'],
'nama'=>$_POST['txtNama'],
'alamat'=>$_POST['txtAlamat'],
'jenis_bantuan'=>$_POST['txtJb'],
'jumlah_bantuan'=>$_POST['txtJml'],
'tanggal_bantuan'=>$_POST['txtTanggal']
);
// simpan bansos dengan menjalankan method simpan
$dataBansos->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=bansos&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data bansos
$bansos=$dataBansos->detail($_GET['id_bantuan']);
if($bansos->jenis_bantuan =='Uang') { $pilihUang='checked';
    $pilihSembako =null; }
    else {
    $pilihSembako='checked'; $pilihUang =null; }
    $html =null;
    $html .='<center>><h3>Form Tambah</h3>';
    $html .='<p>Silahkan masukan form </p>';
    $html .='<form method="POST"
    action="index.php?file=bansos&aksi=update">';
    $html .='<p>Nomor Id Bantuan<br/>';
    $html .='<input type="text" name="txtId" value="'.$bansos->id_bantuan.'"
    placeholder="Masukan Id Bantuan" autofocus/></p>';
    $html .='<p>Nama Penerima Bantuan<br/>';
    $html .='<input type="text" name="txtNama" value="'.$bansos->nama.'"
    placeholder="Masukan Nama Lengkap" size="30" required/></p>';
    $html .='<p>Alamat<br/>';
    $html .='<input type="text" name="txtAlamat" value="'.$bansos->alamat.'"
    placeholder="Masukan Alamat" size="30" required/>,';
    $html .='<p>Jenis Bantuan<br/>';
    $html .='<input type="radio" name="txtJb" value="Uang"
    value="Uang" '.$pilihUang.'> Uang';
    $html .='<input type="radio" name="txtJb" value="Sembako"
    value="Sembako" '.$pilihSembako.'>Sembako</p>';
    $html .='<p>Jumlah Bantuan<br/>';
    $html .='<input type="text" name="txtJml"value="'.$bansos->jumlah_bantuan.'"
    placeholder="Masukan Nama Lengkap" size="30" required/></p>';
    $html .='<p>Tanggal Bantuan<br/>';
    $html .='<input type="date" name="txtTanggal"value="'.$bansos->tanggal_bantuan.'"
    required/></p>';
    $html .='<p><input type="submit" name="tombolSimpan"
    value="Simpan"/></p></center>';
    $html .='</form>';
    echo $html;
    }
    // aksi tambah data
    else if ($_GET['aksi']=='update') {
    $data=array(
        'nama'=>$_POST['txtNama'],
        'alamat'=>$_POST['txtAlamat'],
        'jenis_bantuan'=>$_POST['txtJb'],   
        'jumlah_bantuan'=>$_POST['txtJml'],
        'tanggal_bantuan'=>$_POST['txtTanggal']
);
$dataBansos->update($_POST['txtId'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=bansos&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataBansos->hapus($_GET['id_bantuan']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=bansos&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>
