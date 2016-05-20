<?php


include_once 'model/config.php';

//funcao q ja importa a classe Validate e o arq dictionary
include_files();




$pageTitle = "Página Inicial";



function pageContent(){

	//chamando metodos estaticos de validação da classe Validate
	Validate::success();
	Validate::error();

	//no caso do validate option, caso nao seja passado nenhum valor para o option vai ser renderizado
	//a pagina welcome.php; no caso do index essa é eh a pagina q sera mostrada
	Validate::opt();
}


include_once 'view/template.php';

?>