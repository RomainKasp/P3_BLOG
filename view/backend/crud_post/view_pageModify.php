    <section id="blog" class="sections">
		<?php require("../view/backend/view_menuAdmin.php"); ?>
        <div class="heading-content text-center">
                <div class="heading-title">
                    <h4>Modification d'une page</h4>
					<div class="separator"></div>
                </div>

				<center>
					<form method="post" action="?page=access&admin=billet&action=updatePag&id=".$idpage>
						<table class=form-tab>
							<tr>
								<td align=right class=form-lib>Nom de la page<input type='hidden' name="pid" value="<?php echo $idpage; ?>"></td>
								<td><input type="text" name="pTitre" size="30" maxlength="30" value="<?php echo $titreChap; ?>" required=required/></td>
							</tr>		
							<tr>
								<td colspan="2"><textarea cols="150" rows="50" name="pTxt"><?php echo $txtChap; ?></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type='submit' value='Modifier'></center></td>
							</tr>	
						</table>
					</form>				
				</center>	
		</div>
    </section>