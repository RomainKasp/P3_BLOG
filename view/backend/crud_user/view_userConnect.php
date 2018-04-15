<section id="about" class="sections">
	<div class="heading-content text-center">
		 <h3>Administration</h3>

		<div class="separator"></div>

	</div>

	<div class="about-bg">
		<div class="container">

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="about-content">
						<form method="post" action="?page=access&admin=home">
							<table>
								<tr>
									<td class="tdco">Identifiant :<input type="hidden" name="tok" value="<?php echo $token; ?>"/></td>
									<td><input type="text" name="idCoUtil" size="15" maxlength="60" required=required/></td>
								</tr>
								<tr>
									<td class="tdco">Mot de passe :</td>
									<td><input type="password" name="pswCoUtil" size="25" maxlength="12" required=required/></td>
								</tr>	
								<tr>
									<td colspan="2" class="sub"><input type="submit" value="Connexion" /></td>
								</tr>				
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>  
	</div>
</section>
