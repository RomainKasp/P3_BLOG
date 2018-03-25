<?php
$commentaireX='<center>
	<div class="usrVign" >
		<table class="usrTab">
			<tr>
				<td colspan="3" class="tab-Lab2">Nombre de reports: '.$nbrRprtCOmX.'</td>
			</tr>
			<tr>
				<td colspan="3" class="tab-Lab2">De '.$pseudoCOmX.' le '.$dateCOmX.' à '.$timeCOmX.'</td>
			</tr>
			<tr>
				<td colspan="3" class="tab-Lab2">'.$txtCOmX.'</td>
			</tr>
			<tr>
				<td><form method="post" action="?page=commentaire&action=reset&idcom='.$idcomX.'"><button class="btn_sign" onClick="submit()">Reset le compteur de report</button></form></td> 
				<td><form method="post" action="?page=commentaire&action=delete&idcom='.$idcomX.'"><button class="btn_sign" onClick="submit()">Supprimer</button></form> </td>
				<td><form method="post" action="?page=commentaire&action=valide&idcom='.$idcomX.'"><button class="btn_sign" onClick="submit()">Validation forcée</button></form></td>
			</tr>
		</table>
	</div>
</center>';