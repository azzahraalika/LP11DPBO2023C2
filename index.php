<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
if (isset($_POST['add'])) {
    //lengkapi
    $tp->add($_POST);
  } 
  else if(isset($_POST['update'])){
    $tp->update($_POST);
  }
  else if(!empty($_GET['tambah'])){
    $tp->formAdd();
  }
  else if (!empty($_GET['id_hapus'])) {
    //lengkapi
    $id = $_GET['id_hapus'];
    $tp->delete($id);
  }
  else if (!empty($_GET['id_edit'])) {
    //lengkapi
    $id = $_GET['id_edit'];
    $tp->formUpdate($id);
  } 
  else{
    $tp->tampil();
  }
