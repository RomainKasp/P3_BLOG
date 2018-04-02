    <section id="blog" class="sections">
		<?php require("../view/backend/view_menuAdmin.php"); ?>
        <div class="heading-content text-center">
                <div class="heading-title">
                    <h4>Modification d'un chapitre</h4>
					<div class="separator"></div>
                </div>

				<center>
					<form method="post" action="?page=billet&action=updateArt&id=".$idt>
						<table class=form-tab>
							<tr>
								<td align=right class=form-lib>Nom du chapitre</td>
								<td><input type="text" name="aTitre" size="30" maxlength="30" value="<?php echo $titreChap; ?>" required=required/></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Numéro du chapitre</td>
								<td><input type="hidden" name="aid" value='<?php echo $idchap; ?>'><input type="number" name="aNum" step="1" value='<?php echo $numChap; ?>'></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Date de visibilité</td>
								<td><input type="date" name="aDatVis" value="<?php echo $dateVisu; ?>"></input></td>
							</tr>	
							<tr>
								<td align=right class=form-lib>Heure de visibilité</td>
								<td><input type="time" name="aHeuVis" value="<?php echo $heurVisu; ?>"></input></td>
							</tr>		
							<tr>
								<td colspan="2"><textarea cols="150" rows="50" name="aTxt"><?php echo $txtChap; ?></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type='submit' value='Modifier'></center></td>
							</tr>	
						</table>
					</form>				
				</center>	
		</div>
    </section>