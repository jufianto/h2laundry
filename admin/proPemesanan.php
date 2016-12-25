<?php
//include "funcpelanggan.php";
require_once "funcadmin.php";
ceklogin();
require_once '../config.php';

//jika server mendapatkan request post
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  switch ($_GET['action']) {
    case 'add':
      # code...
      
      break;

      }
}
