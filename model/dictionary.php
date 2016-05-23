<?php
	//array global com as msg do dicionario
	$GLOBALS['dictionary'] = array(


		'error'=> "Erro 404 - Informação não encontrada",
		'nome_empty'=> "Preencha o campo nome",
		'user_created'=> "Pessoa cadastrada com sucesso",
		'user_deleted'=> "Pessoa deletada com sucesso",
		'user_updated'=> "Dados da pessoa atualizados com sucesso",









		);
		//fim array


	/*funcao dicti recebe como parametro uma msg, e retorna o valor equivalente dessa msg no q esta no array de dictionay. Exemplo: a funcao pode receber o valor 'error_404' como $msg e entao vai retornar a msg "Página não encontrada"; caso a $msg informada no parametro nao exista no array de dictioray entao vai retornar erro*/
	function dictionary($msg){
		if(isset($GLOBALS['dictionary'][$msg])){
			return $GLOBALS['dictionary'][$msg];
		} else{
			return $GLOBALS['dictionary']['error'];

		}

	} // fim funcao







?>