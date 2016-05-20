<?php

include_once dirname(__DIR__).'/model/config.php';

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';


$man = new Manager();

$pic = $_GET['PicNum'];


$filt['cod_pes'] = $pic;

$res = $man->select("pessoas",null,$filt);

header("Content-Type: image/jpg"); 

foreach ($res as $key) {
	echo $key['foto_pes'];
}



?>