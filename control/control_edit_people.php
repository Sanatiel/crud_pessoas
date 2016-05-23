<?php

include_once dirname(__DIR__).'/model/config.php';

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

//obj de manager
$man = new Manager();


$new_data['nome_pes'] = Validate::validateCampos($_POST['nome']);
$new_data['email_pes'] = Validate::validateCampos($_POST['email']);
$new_data['tel_pes'] = Validate::validateCampos($_POST['telef']);
$filter['cod_pes'] = $_POST['id'];


if($new_data['nome_pes'] == ""){
	header("location: ".base_url()."?error=nome_empty");
}

if($new_data['nome_pes'] == " "){
	header("location: ".base_url()."?error=nome_empty");
}


$man->update("pessoas",$new_data,$filter);


header("location: ".base_url()."/?opt=list_people&success=user_updated");


?>