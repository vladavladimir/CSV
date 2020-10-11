<?php

$host='127.0.0.1';
$user='root';
$pass='';
$dbname='file';

$link=mysqli_connect($host,$user,$pass,$dbname);
if (!$link){die("error".mysqli_connect_error());}