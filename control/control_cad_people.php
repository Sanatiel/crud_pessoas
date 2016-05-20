<?php

include_once dirname(__DIR__).'/model/config.php';

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

//obj de manager
$man = new Manager();


$people['nome_pes'] = Validate::validateCampos($_POST['nome']);
$people['email_pes'] = Validate::validateCampos($_POST['email']); 
$people['tel_pes'] = Validate::validateCampos($_POST['telef']); 


/*
$people['foto_pes']['img'] = $_FILES['foto']['tmp_name'];
$people['foto_pes']['tamanho'] = $_FILES['foto']['size'];
$people['foto_pes']['tipo'] = $_FILES['foto']['type'];
$people['foto_pes']['nome'] = $_FILES['foto']['name'];

$fp = fopen($people['foto_pes']['img'], "rb");
$conteudo = fread($fp, $people['foto_pes']['tamanho']);
$conteudo = addslashes($conteudo);
fclose($fp);
*/

$imagem = $_FILES['foto'];

$nomeFinal = time().'.jpg';
if(move_uploaded_file($imagem['tmp_name'], $nomeFinal)){
	$tamanImg = filesize($nomeFinal);

	$people['foto_pes'] = addslashes(fread(fopen($nomeFinal, "r"), $tamanImg));

}



if($people['nome_pessoa'] == ""){
	header("location: ".base_url()."?error=nome_empty");
}

if($people['nome_pessoa'] == " "){
	header("location: ".base_url()."?error=nome_empty");
}


$man->insert("pessoas",$people);

unlink($nomeFinal);

header("location: ".base_url()."/?opt=cad_people&success=user_created");


?>