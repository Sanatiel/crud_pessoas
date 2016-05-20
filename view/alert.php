<div class="row">
		<div class="col-md-2"></div>

			<!-- nas classes de alert, o alert-class, alert-icon e alert-msg vao ser definidos pelo metodo ValidadeMESSAGE
				 da classe validade, assim se for um sucesso ou erro o metodo vai verificar e mostrar a msg correta	 -->

			<div class="col-md-8">
				<div class="alert alert-<?php echo $alert_class; ?>">
					<span class="glyphicon glyphicon-<?php echo $alert_icon; ?>"> </span>
					<strong><?php echo $alert_msg; ?></strong>
				</div>
					
			</div>

		<div class="col-md-2"></div>
</div>