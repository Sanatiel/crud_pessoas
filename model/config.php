<?php


//endereco web da aplicacao, usado para referenciar/linkar arquivos, como com HREF
//var que adiciona o http e o servidor, guardando assim o caminho do projeto no servidor
//superglobal $_SERVER['SERVER_NAME'] pegar o servidor q esta sendo usado
$GLOBALS['base_url'] = "http://".$_SERVER['SERVER_NAME']."/crud_pessoas";


//end fisico da app, usado para importacao e inclusao de arquivos
$GLOBALS['base_server'] = $_SERVER['DOCUMENT_ROOT']."/crud_pessoas";



//funcao para chamar o array da base_url, para ficar mais facil a leitura do codigo
function base_url(){
	return $GLOBALS['base_url'];
}


//funcao para chamar o array da base_server, para ficar mais facil a leitura do codigo
function base_server(){
	return $GLOBALS['base_server'];
}


//para referenciar arquivos, tipo com HREF -> base_url()
//para importacao/inclusao de arquivos -> base_server()



//funcao para inclusao dos arquivos que aparecem em todas as páginas
	function include_files(){
		include_once base_server().'/control/Validade.class.php';
		include_once base_server().'/model/dictionary.php';
				
	}




?>