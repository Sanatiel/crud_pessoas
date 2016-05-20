<div class="col-md-3"></div>
<div class="col-md-6">
<h3>Cadastro de pessoas</h3>
<br>
<br>																									<!-- atributo enctype="multipart/form-data" é usado para uploads -->
<form action="<?php echo base_url();?>/control/control_cad_people.php" method="POST" class="text-center" enctype="multipart/form-data"> 
	<label>Nome</label>
	<input type="text" name="nome"  required class="form-control text-center" placeholder="Digite o nome">

	<br>

	<label>Email</label>
	<input type="email" name="email"  required class="form-control text-center" placeholder="Digite o email">

	<br>

	<label>Telefone</label>
	<input type="text" name="telef" required  maxlength="10" class="form-control text-center" placeholder="00000-0000">


	<br>

	<label>Foto (opcional)</label>
	<input type="file" name="foto"  class="form-control">

	<br>

	<button class="btn btn-success" > <span class="glyphicon glyphicon-ok"> <strong style="font-family:arial;">Cadastrar</strong> </span>  </button>

	<button class="btn btn-primary" type="reset"> <span class="glyphicon glyphicon-erase"> <strong style="font-family:arial;">Limpar Campos</strong> </span>  </button>

</form>
</div>

<div class="col-md-3"></div>