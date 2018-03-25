<?php
$commentaireX='<center>
	<div class="usrVign" >
		<form method="post" action="?page=commentaire&idcom='.$idcomX.'">
		<table class="usrTab">
			<tr>
				<td class="tab-Lab2">De '.$pseudoCOmX.' le '.$dateCOmX.' à '.$timeCOmX.'</td>
			</tr>
			<tr>
				<td class="tab-Lab2">'.$txtCOmX.'</td>
			</tr>
			<tr>
				<td class="tab-Lab2">
					<input type="hidden" name="valRprt" value="'.$nbrRprtCOmX.'"> 
					<button class="btn_sign" onClick="submit()">Signaler le commentaire</button> 
				</td>
			</tr>
		</table>
		</form>
	</div>
</center>';