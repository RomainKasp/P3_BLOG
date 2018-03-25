<center>
	<div class="usrVign" >
		<form method="post" action="?page=chapitre&idchap=<?php echo $idchap; ?>">
		<table class="usrTab">
			<tr>
				<td class="tab-Lab"> Votre pseudo : </td>
				<td class="tab-Val"> <input type="text" name="newCom_ident"> </td>
			</tr>
			<tr>
				<td class="tab-Lab"> Votre mail : </td>
				<td class="tab-Val"> <input type="text" name="newCom_mail"> </td>
			</tr>
			<tr>
				<td colspan='2' class="tab-Lab2"> Votre message : </td>
			</tr>
			<tr>
				<td colspan='2' class="tab-Lab2"><textarea name="newCom_txt"></textarea></td>
			</tr>
			<tr>
				<td colspan='2' class="tab-Lab2"><input type="submit" value="Soumettre"> </td>
			</tr>
		</table>
		</form>
	</div>
</center>