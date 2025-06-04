<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

error_reporting(E_ALL);
ini_set('display_errors', 5);

include("view/TampilRencanabaksosdanBaksos.php");

$tp = new TampilRencanabaksosdanBaksos();

if(isset($_POST['Add'])){
    $tp->addDataRencanabaksos();
    header("Location: index.php");
    exit;
}else if(!empty($_GET['id_hapus_rencanabaksos'])){
    $tp->deleteDataRencanabaksos();
    header("Location: index.php");
    exit;
}else if(isset($_POST['id_edit_rencanabaksos'])){
    $tp->editDataRencanabaksos();
    header("Location: index.php");
    exit;
}else if(isset($_GET['id_implementasi'])){
    $tp->implementasiBaksos();
    header("Location: index.php");
    exit;
}else{
    $tp->tampil();
}