    <section id="blog" class="sections">
		<?php require("../view/backend/view_menuAdmin.php"); ?>
        <div class="heading-content text-center">
                <div class="heading-title">
                    <h3>Articles</h3>
					<center>
						<div class="usrVign2" >
							<form method="post" action="?page=access&admin=createArt">
								<button onClick="submit()" class="btnUser">Créer un nouvel article</button>
							</form>
						</div>
					</center>					
					<div class="separator"></div>
                </div>

                <div class="heading-separator"></div>
				<center><?php echo $vignettes; ?></center>	
		</div>

    </section>