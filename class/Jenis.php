<?php
class Jenis extends Database {
public function tampil(){
// 1. mysqli_query
$sql=$this->mysqli->query("SELECT * FROM jenis_bansos") or die
($this->CekError());
while($data=$sql->fetch_object()){
$dataJenis[]=$data;
}
// 2. jika datanya ada
if(isset($dataJenis)){
// 3. memberikan nilai balik atas data yang diambil dari db
return $dataJenis;
}
// 4. menutup koneksi db,procedural== mysqli_close()
$this->TutupKoneksi();
}
public function detail($kode_bansos){
// 1. mysqli_query
$sql=$this->mysqli->query("SELECT * FROM jenis_bansos WHERE
kode_bansos='".$kode_bansos."'") or die ($this->CekError());
$dataJenis=$sql->fetch_object();
// 2. jika datanya ada
if(isset($dataJenis)){
// memberikan nilai balik atas data yang diambil dari db
return $dataJenis;
}
// 3. menutup koneksi db,procedural== mysqli_close()
$this->TutupKoneksi();
}
function update($kode_bansos,$data){
    // 1. memecah array menjadi string
    $script_update_temp=null;
    foreach($data as $field=>$value){
    $script_update_temp .= $field."='".$value."',";
}
// 2. menghilangkan tanda koma pada akhir string
$script_update=rtrim($script_update_temp,',');
// 3. menghilangkan tanda koma pada akhir string
$this->mysqli->query("UPDATE jenis_bansos SET ".$script_update."
WHERE kode_bansos='".$kode_bansos."'") or die ($this->CekError());
// 4. tutup koneksi
$this->TutupKoneksi();
}
function hapus($kode_bansos){
// 1. Jalankan perintah delete query
$this->mysqli->query("DELETE FROM jenis_bansos WHERE
kode_bansos='$kode_bansos'");
// 2. tutup koneksi
$this->TutupKoneksi();
}
function simpan($data){
// 1. membuat 2 kolom bantu
$kolom_nya=null;
$nilai_nya=null;
// 2. memecah antara kolom dan nilai
foreach($data as $kolom=>$nilai){
$kolom_nya .= $kolom.",";
$nilai_nya .= "'".$nilai."',";
}
// 3. menghilangkan tanda koma pada masing2 variabel,untuk mengindari error mysql
$kolom_nya_baru=rtrim($kolom_nya,',');
$nilai_nya_baru=rtrim($nilai_nya,',');
// 4. membuat syntax sql untuk simpan
$sql_simpan="INSERT INTO jenis_bansos (".$kolom_nya_baru.")
VALUES (".$nilai_nya_baru.")";
// 5. menjalankan perintah sql diatas dan mencek error
$this->mysqli->query($sql_simpan) or
die($this->CekError());
// 6. close koneksi
$this->TutupKoneksi();
}
}