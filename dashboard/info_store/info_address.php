<?php
// session_start();
// $username = 'root';
// $password = '';
// $connect = new PDO('mysql:host=localhost;dbname=cims19_12', $username, $password);

session_start();
$username = 'gorukhamaricom_cims';
$password = 'A^j3wkj.()nX';
$connect = new PDO('mysql:host=localhost;dbname=gorukhamaricom_cims', $username, $password);

if(!$connect)
{
  echo $connect->errorInfo();
}

?>
