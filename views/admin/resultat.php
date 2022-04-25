
<?php 
?>
<span style="font-size:14px;"><br/>
<h2 style="text-align:center"> Resultat final </h2>
</span>
		 <!--RENSEIGNEMENT DES REFERENCES-->  
		 <p>
		 <form action="controllers/Con_jeu/resultatFinal.php" method="POST" clas="resultat" > 
			<fieldset id="tab2">
                 <div style="padding-left:2%">
                   <img src="views/img/figurine.png" class="figurine" width="auto" height="80px" style="position:relative;" >
					<img src="views/img/signature.jpg" width="400px" height="100px" style="position:justify;text-decoration:underline; width:auto; padding-top:0px; padding-bottom:0px; padding-right:20px;">
				</div>
                      <label>&nbsp;&nbsp;&nbsp; Tonnage de canne  <span style="color: red;">*</span>: </label>
					  <input type="number" placeholder="    Tonnage canne " name="canne" minlength="3" maxlength="8" required>
				
                      <br/><br/><br/><label>&nbsp;&nbsp;&nbsp;&nbsp; Tonnage de sucre <span style="color: red;">*</span>: </label> 
						 <input type="number" placeholder="    Tonnage sucre " name="sucre" minlength="3" maxlength="8" required>
					
                         <br/><br/><br/><label> Nombre de gagnants <span style="color: red;">*</span>: </label> 
						 <input type="number" placeholder="   Nombre de gagnants!" name="gagnant" minlength="1" maxlength="6" required>
					    <br/><br/>
                    <input type="reset" value="Annuler" class="annuler">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" class="envoi">
			</fieldset>
			</form>
			</p>