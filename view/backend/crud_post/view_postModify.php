<form method="post" action="traitement.php">
	<table class=form-tab>
		<tr>
			<td align=right class=form-lib>Nom du chapitre</td>
			<td><input type="text" name="nomChap" size="30" maxlength="30" required=required/><?php echo $nomUpdChap; ?></td>
		</tr>	
		<tr>
			<td align=right class=form-lib>Date de visibilité</td>
			<td><input type="datetime" name="datVisuChap"><?php echo $datVueUpdChap; ?></input></td>
		</tr>	
		<tr>
			<td colspan="2"><textarea name="contentChap"><?php echo $contentUpdChap; ?></textarea></td>
		</tr>	
	</table>
</form>