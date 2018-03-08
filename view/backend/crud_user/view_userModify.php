<section id="about" class="sections">
	<?php require("../view/backend/view_menuAdmin.php"); ?>
	<div class="heading-content text-center">
		 <h3>Modification d'un utilisateur</h3>

		<div class="separator"></div>
		<center>
		<form method="post" action="traitement.php">
			<table class=form-tab>
				<tr>
					<td align=right class=form-lib>Nom utilisateur</td>
					<td><input type="text" name="nomNewUti" size="30" maxlength="30" required=required/><?php echo $nomUpdChap; ?></td>
				</tr>	
				<tr>
					<td align=right class=form-lib>Mail utilisateur</td>
					<td><input type="text" name="mailNewUti" size="30" maxlength="30" required=required/><?php echo $nomUpdChap; ?></td>
				</tr>		
				<tr>
					<td align=right class=form-lib>Date de fin de droit</td>
					<td><input type="datetime" name="datFinNewUti"></input></td>
				</tr>
				<tr>
					<td class="tdco">Mot de passe :</td>
					<td><input type="password" name="pswNewUti" size="15" maxlength="15" required=required/></td>
				</tr>	
				<tr>
					<td class="tdco">Confirmation de mot de passe :</td>
					<td><input type="password" name="pswNewUtiBis" size="15" maxlength="15" required=required/></td>
				</tr>		
			</table>
		</form>
		</center>
	</div>
</section>