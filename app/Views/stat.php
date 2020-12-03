<?php 
date_default_timezone_set("Asia/Jakarta");

echo view('log.php');

$ip = ip_user();
$browser = browser_user();
$os = os_user();

$hri = date("D");
$tgl = date("j");
$bln = date("m");

if(!isset($_COOKIE['VISITOR'])) {
    $duration = time()+60*60*24;
    setcookie('VISITOR',$browser,$duration);
	mysqli_query($koneksi, "INSERT INTO harian (harian_ip, harian_os, harian_browser, harian_hari, harian_tanggal) VALUES ('$ip', '$os', '$browser', '$hri', '$tgl')");
}

?>