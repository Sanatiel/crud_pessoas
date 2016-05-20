<!DOCTYPE html>
<html lang="pt-br">
<head>
	 <meta charset="utf-8">
                                                 <!-- chamada da funcao static para verificar qual nome certo para o pageTitle-->
	<title>	<?php if(isset($_GET['opt'])){ $pageTitle = Validate::valPageTitle($_GET['opt']); } echo $pageTitle; ?>	</title>

	<!-- linkando com css do bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/view/assets/bootstrap/css/bootstrap.css">

</head>

<body>

  <div class="container text-center">
  	
  <header class="row navbar" style="background-color:lightgreen;" >
  	<div class="col-md-5"></div>

  	<div class="col-md-2" >
  	<a href="<?php echo base_url(); ?>" class="navbar-brand"><span>People Manager</span></a>
  	</div>

  	<div class="col-md-5"></div>
  </header>

  
  </div>

 	<section class="row text-center">
 		
 		<div class="col-md-3"></div>

 		<div class="col-md-6" >

 			<?php pageContent(); ?>
 			
 		</div>
 		
 		<div class="col-md-3" ></div>
 	</section>


  <script src="<?php echo base_url();?>/view/assets/bootstrap/js/jquery.js"></script>
  <script src="<?php echo base_url();?>/view/assets/bootstrap/js/bootstrap.js"></script>

 </body>

</html>