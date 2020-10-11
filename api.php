<?php

include ('conn.php');

$myArray=array();
$myRow=array();

if (empty($_POST['iload'])){
    $vlimit=1;
} else {
    $vlimit=$_POST['iload'];
}

if (isset($_POST['oset'])){
    $oset=$_POST['oset'];
} else {
    $oset=0;
}

$myArray['vlimit']=$vlimit;
$myArray['oset']=$oset;

$query="SELECT * FROM `products` WHERE 1 ORDER By id ASC LIMIT ".$vlimit." OFFSET ".$oset;
$myArray['query']=$query;
$result=$link->query($query);

while ($row = $result->fetch_array()){
    $myRow[]=array(
        "id"=>$row['id'],
        "model_number"=>$row['model_number'],
        "category_name"=>$row['category_name'],
        "department_name"=>$row['department_name'],
        "manufacturer_name"=>$row['manufacturer_name'],
        "upc"=>$row['upc'],
        "sku"=>$row['sku'],
        "regular_price"=>$row['regular_price'],
        "sale_price"=>$row['sale_price'],
        "description"=>$row['model_number'],
        "url"=>$row['url']
    );
}

$myArray['content']=$myRow;
echo json_encode($myArray);