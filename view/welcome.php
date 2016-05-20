<?php

include_once dirname(__DIR__).'/model/config.php';

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

$man = new Manager();

$list_p = $man->select("pessoas",null,null);



@$filt['nome_pes'] = $_POST['pes'];

$pes_detailed = null; $man->select("pessoas",null,$filt);

?>

<div class="jumbotron">
 			<h3>Escolha a opção</h3>

 			<a class="btn btn-success" href="?opt=cad_people">Cadastrar</a>
 			<a class="btn btn-success" href="?opt=list_people">Listar Todos</a>

 			<br>
 			<br>
 			<br>
 			

 			<h4>Pesquisar Pessoa</h4>

 			<form action="" method="POST">

 				<input list="pessoas" name="pes">
 				<datalist id="pessoas">
 				<?php
 					foreach ($list_p as $key) {
 						echo '<option id="idec" value="',$key['nome_pes'],'"></option>';
 						echo '<input type="hidden" value="',$key['cod_pes'],'">';
 					}


 				?>
 					
 				</datalist>

 				<br>
 				<br>
 				
 				<!-- <a href="" id="detail_people" class="btn btn-md btn-success">Detalhar</a> -->
 				<button class="btn btn-md btn-success">Detalhar</button>
 			</form>

 			<br>
 			<br>
 			
 			<?php

 				if(isset($_POST['pes'])){


					$pes_detailed = $man->select("pessoas",null,$filt);

					if($pes_detailed != null){
 						echo '<table class="table table-hover" style="width: 100%;">';
						echo '<tr><th class="text-center">Id</th> <th class="text-center">Nome</th> <th class="text-center">Email</th> <th class="text-center">Telefone</th> </tr>';

 						foreach ($pes_detailed as $key) {

 						echo '<tr>';	
 						echo '<td>',$key['cod_pes'],'</td>';
 						echo '<td>',$key['nome_pes'],'</td>';
 						echo '<td>',$key['email_pes'],'</td>';
 						echo '<td>',$key['tel_pes'],'</td>';
 						echo '</tr>';

 						} //fim foreach
					

					echo '</table>';
 					
 					} else{

 						echo '<table class="table table-hover" style="width: 100%;">';

 						echo '<tr><td>Pessoa pesquisada não existe na base de dados</td></tr>';

 						echo '</table>';
 					} //fim if pesdetailed

 					

				} //fim if isset
 				
 			?>

 </div>