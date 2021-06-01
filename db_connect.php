<?php 
$database['host']='localhost';
$database['username']='root';
$database['userpass']='';
$database['name']='parttimejobs';



$link= mysqli_connect($database['host'],$database['username'],$database['userpass'],
$database['name'])
;
if(!$link){
  echo 'cannot login';

}

    ?>