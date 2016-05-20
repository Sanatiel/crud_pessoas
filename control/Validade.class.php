<?php
	
	//o nome da classe está certo mas o nome do arquivo escrevi errado ;-;
	//nome do arquivo ta ValidaDe 
	class Validate{

		//funcao estatica para Validar mensagens de sucesso
		public static function success(){

			if(!isset($_GET['success'])){
				return false;
			}

			//variaveis que definiram a classe, mensagem e icone quando a div de sucesso for mostrada
			//no caso do alert-msg a msg q ele vai receber para mostrar na tela será o retorno da funcao
			//dicionary, q busca no array global dicionary a msg adequada
			$alert_class = "success";
			$alert_msg = dictionary($_GET['success']);
			$alert_icon = "ok";

			include_once base_server().'/view/alert.php';


		}

		//funcao estatica para Validar mensagens de erro
		public static function error(){
			if(!isset($_GET['error'])){
				return false;
			}

			//variaveis que definiram a classe, mensagem e icone quando a div de sucesso for mostrada
			//no caso do alert-msg a msg q ele vai receber para mostrar na tela será o retorno da funcao
			//dicionary, q busca no array global dicionary a msg adequada
			$alert_class = "danger";
			$alert_msg = dictionary($_GET['error']);
			$alert_icon = "warning-sign";

			include_once base_server().'/view/alert.php';
		}


		//funcao para validar campos
		public static function validateCampos($dados){

			$dados = trim($dados);
			$dados = stripcslashes($dados);
			$dados = htmlspecialchars($dados);
			return $dados;

		}
		
		//funcao para validar o pageTitle, se tiver sido mandado option via get, vai receber aqui e verificar
		//qual page Title certo mostrar
		public static function valPageTitle($opt){
			if($opt == 'cad_people'){ 
				$pageTitle = "Cadastro de Pessoas"; 
			} 

			if($opt == 'list_people'){
				 $pageTitle = "Listagem de Pessoas";
			}

			return $pageTitle;
		} 



		//funcao estatica para Validar options via $_GET
		public static function opt(){
			//se nao houver option na url vai renderizar a pagina de welcome(isso acontece na pagina index)
			if(!isset($_GET['opt'])){
				include_once base_server().'/view/welcome.php';
				return false;
			}


			switch ($_GET['opt']) {
				case 'cad_people':
					
					include_once base_server().'/view/forms/form_cad_people.php';

					return true;

					break;

				case 'list_people':
				
					include_once base_server().'/view/forms/form_list_people.php';

					return true;

					break;	

				case 'edit_people':
				
					include_once base_server().'/view/forms/form_edit_people.php';

					return true;

					break;		
				
				default:
					# code...
					break;
			}



		}




	} //fim class





?>