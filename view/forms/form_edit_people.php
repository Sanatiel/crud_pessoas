<?php

include_once base_server().'/model/class/Connection.class.php';

include_once base_server().'/model/class/Manager.class.php';

include_once base_server().'/control/Validade.class.php';

$man = new Manager();

$filter['cod_pes'] = $_GET['id'];

$pes = $man->select("pessoas",null,$filter);


?>

<div class="col-md-3"></div>
<div class="col-md-6">
<h3>Edição de pessoas</h3>
<br>
<br>

<form action="<?php echo base_url();?>/control/control_edit_people.php" method="POST" class="text-center" enctype="multipart/form-data"> 
	<label>Id</label>
	<input type="text" name="id" readonly required class="form-control text-center" value="<?php foreach($pes as $key){ echo $key['cod_pes']; } ?>">

	<br>


	<label>Nome</label>
	<input type="text" name="nome"  required class="form-control text-center" value="<?php foreach($pes as $key){ echo $key['nome_pes']; } ?>">

	<br>

	<label>Email</label>
	<input type="email" name="email"  required class="form-control text-center" placeholder="Digite o email" value="<?php foreach($pes as $key){ echo $key['email_pes'];} ?>">

	<br>

	<label>Telefone</label>
	<input type="text" name="telef" required  maxlength="10" class="form-control text-center" placeholder="00000-0000" value="<?php foreach($pes as $key){ echo $key['tel_pes'];} ?>">


	<br>


	<button class="btn btn-success" > <span class="glyphicon glyphicon-ok"> <strong style="font-family:arial;">Alterar </strong> </span>  </button>

	<button class="btn btn-primary" type="reset"> <span class="glyphicon glyphicon-erase"> <strong style="font-family:arial;">Resetar Edição</strong> </span>  </button>

</form>

</div>

<div class="col-md-3"></div>