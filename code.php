<?php


require_once "db.php";

$db = new DBConnection;

require_once "class.php";

$crud = new CRUD;

$data = $crud->Select();


if(isset($_POST["qeydiyyat"])){
    $crud->Insert($_POST) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}

if(@$_GET["sil"]=="ok"){
    $crud->Delete(@$_GET["id"]) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}