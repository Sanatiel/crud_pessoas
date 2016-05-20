<?php

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

$man = new Manager();

$list_pes = $man->select("pessoas",null,null);



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


	<!-- esse input vai mandar o id do cliente/servico/func a ser excluido -->
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
			foreach ($list_pes as $key) {
				echo '<tr>';
				echo '<td>',$key['cod_pes'],'</td>';
				echo '<td>',$key['nome_pes'],'</td>';
				echo '<td>',$key['email_pes'],'</td>';
				echo '<td>',$key['tel_pes'],'</td>';
				echo '<td><a href="" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> <button class="btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></button>  </td>';
			//	echo '<td><a href="'.base_url().'/view/getImg.php?PicNum=',$key['cod_pes'],'">vergoto</a></td>';
			//	echo '<td><img src="',base_url(),'/view/getImg.php?PicNum=2"></td>';
				echo '</tr>';
			}

		?>

	

	</table>

	

<button>env</button>
</form>