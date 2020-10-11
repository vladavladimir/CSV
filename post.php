<?php

//include csv.php and start csv class
include "csv.php";
$csv=new csv();

//when click on import button
if (isset($_POST['sub'])){
    $csv->import($_FILES['file']['tmp_name']);
}
