    <section id="blog" class="sections">
		<?php require("../view/backend/view_menuAdmin.php"); ?>
        <div class="heading-content text-center">
                <div class="heading-title">
                    <h4>Création d'un chapitre</h4>
					<div class="separator"></div>
                </div>

				<center>
					<form method="post" action="?page=billet&action=createArt&id=".$idt>
						<table class=form-tab>
							<tr>
								<td align=right class=form-lib>Nom du chapitre</td>
								<td><input type="text" name="aTitre" size="30" maxlength="30" required=required/></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Numéro du chapitre</td>
								<td><input type="range" name="aNum" step="1" value='<?php echo $numChap; ?>' min='<?php echo $numChap; ?>' max='<?php echo $numChapMax; ?>'></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Date de visibilité</td>
								<td><input type="date" name="aDatVis"></input></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Heure de visibilité</td>
								<td><input type="time" name="aHeuVis"></input></td>
							</tr>		
							<tr>
								<td colspan="2"><textarea cols="150" rows="50" name="aTxt"></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type='submit' value='Créer'></center></td>
							</tr>	
						</table>
					</form>				
				</center>	
		</div>
    </section>