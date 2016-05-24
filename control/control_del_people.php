<?php

include_once dirname(__DIR__).'/model/config.php';

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';


$man = new Manager();

//o filtro que sera o codigo da pessoa recebera o id da pessoa a ser excluida, q vira via post
$filter['cod_pes'] = $_POST['exclu'];

$man->delete("pessoas",$filter);

header("location: ".base_url()."/?success=user_deleted");



?>