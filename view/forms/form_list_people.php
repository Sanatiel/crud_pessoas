<?php

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

$man = new Manager();


//campo que sera pesquisado (vai procurar, por nome, email, ou data?, etc)
@$campo = $_POST['campo'];

//busca solicitada (é o que a pessoa digitar na caixa de pesq)
@$busca = $_POST['busca'];

//tipo de ordenacao
@$order = $_POST['ordenacao'];

//se a pessoa nao marcar o radio informando por qual campo ela quer pesquisar, vai por padrao pesquisar pelo nome
if(!isset($_POST['campo'])){
	$campo = 'nome';

}

//se nao informar qual ordenacao deseja, vai por padrao pelo nome tbm
if(!isset($_POST['ordenacao'])){
	$order = 'nome';

}




//se for escolhido uma ordem, a var $order recebe o post dessa escolha e depois eh feito um switch
//para atribuir a var $order o campo correto do banco de dados, baseado na opcao de ordem escolhida pela pessoa

switch ($order) {
	//se escolheu ordenar por nome, a var $order vai receber o valor nome_pes, que é o nome do camp no banco de dados referente ao nome
	case 'nome':
		$order = 'nome_pes';

		break;

	case 'id':
		$order = 'cod_pes';

		break;	

	case 'email':
		$order = 'email_pes';

		break;		
	
	default:
		$order = 'nome_pes';

		break;
} //fim switch


//o msm switch q ocorreu com o $order vai ocorrer tbm com o $campo, para atribuir o campo certo do banco de dados
//ao qual a pessoa deseja pesquisar

	switch ($campo) {
		case 'nome':
			$campo = 'nome_pes';

			break;

		case 'id':
			$campo = 'cod_pes';
			
			break;	

		case 'email':
			$campo = 'email_pes';
			
			break;		
		
		default:
			$campo = 'nome_pes';

			break;
	}

//se nao for informada uma busca, o as var de filtros e extra receberao valor nulo, para que a sql retorne
// todos os registros (SELECT * FROM pessoas);
if(!isset($_POST['busca'])){
	$filters = null;
	$extra = null;


} else{



//caso a busca tenha sido informada(campo pra pesquisar tenha sido preenchido), sera gerado um filtro com
//o campo de pesquisa e a busca informada, alem de uma $extra com a ordenacao informada se houver
//as % em volta do busca é pq sera usado um LIKE na sql, para poder buscar qq valor aproximado ao q foi digitado	
$filters[$campo] = '%'.$busca.'%';

$extra = " ORDER BY ";
$extra .= $order;

}



//var com as pessoas do banco, é usado select_like devido parametro LIKE
$list_pes = $man->select_like("pessoas",null,$filters,$extra);

?>

<h3>Listagem de pessoas</h3>
<br>

<form action="" method="POST">
	<label>Tipo de busca:</label>
	<br>
	<input type="radio" name="campo" value="id"> Id 	&nbsp;
	<input type="radio" name="campo" value="nome"> Nome 	&nbsp;
	<input type="radio" name="campo" value="email"> Email &nbsp;
	
	<br>
	<br>

	<label>Ordenar por:</label>
	<br>
	<input type="radio" name="ordenacao" value="id"> Id 	&nbsp;
	<input type="radio" name="ordenacao" value="nome"> Nome 	&nbsp;
	<input type="radio" name="ordenacao" value="email"> Email &nbsp;
	
	<br>
	<br>
	<input type="text" name="busca" placeholder="Pesquisar">
	<button class="btn btn-success">Pesquisar</button>


	<!-- esse input vai mandar o id do cliente/servico/func a ser excluido, ele sera preenchido via Jquery quando o botao de excluir for clicado -->
	<input type="text" hidden value="" name="exclu" id="ex">

	<br>
	<br>

	<table class="table table-hover">

	<tr>
		<th class="text-center"> Id </th>
  		<th class="text-center"> Nome </th>
  		<th class="text-center"> Email 	</th>
 		<th class="text-center"> Tel 	</th>
 		<th class="text-center"> Ações 	</th>


	</tr>

	
		<?php 

			if($list_pes != null){

				foreach ($list_pes as $key) {
				echo '<tr>';
				echo '<td>',$key['cod_pes'],'</td>';
				echo '<td>',$key['nome_pes'],'</td>';
				echo '<td>',$key['email_pes'],'</td>';
				echo '<td>',$key['tel_pes'],'</td>';
				echo '<td><a href="?opt=edit_people&id=',$key['cod_pes'],'" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>   <button type="button" class="btexclui btn btn-md btn-danger" value="',$key['cod_pes'],'"><span class="glyphicon glyphicon-trash"></span></button>  </td>';
			//	echo '<td><a href="'.base_url().'/view/getImg.php?PicNum=',$key['cod_pes'],'">vergoto</a></td>';
			//	echo '<td><img src="',base_url(),'/view/getImg.php?PicNum=2"></td>';
				echo '</tr>';
				
				} //fim foreach
			
			} else{
				echo '<tr>';
				echo '<td></td>';
				echo '<td> Não foram encontrados resultados para a busca.</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '</tr>';

			}

			

		?>

	

	</table>

	

</form>




<!-- DIV PARA MODAL EXCLUSAO-->
<div class="modal fade text-center" id="exclui">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" > Atenção! Este processo irá apagar permanentemente os dados da pessoa </h4>
				<hr>
				<h4 class="modal-title" > Confirma a exclusão da pessoa? </h4>
			</div>	

			<div class="modal-body text-center">
				
					
					<!-- type button para opcao de cancelar para nao submitar, data-dismiss para sair do modal ao clicar -->
					<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>

					<button  id="confdelpes" class="btn btn-danger"> Confirmar</button>
				
				
			</div>

		
		</div> <!-- content -->
	</div> <!-- dialog -->
</div> <!-- modal fade-->
