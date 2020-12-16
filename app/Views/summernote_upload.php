<?php 
$web = $_SERVER['HTTP_HOST'];

if ($_FILES['file']['name']) {
  if (!$_FILES['file']['error']) {
    $foto = $_FILES['file']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $filename = md5($foto).".$ext";
    $destination = 'gambar/diskusi/'.$filename;
    $location = $_FILES["file"]["tmp_name"];
    move_uploaded_file($location, $destination);
    echo '/gambar/diskusi/'.$filename;
  }else{
    echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
  }
}
