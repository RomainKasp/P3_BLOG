        <section id="about" class="sections">

            <div class="heading-content text-center">

                <h3><?php echo $titreChapitre; ?></h3>

                <div class="separator"></div>
				
				<?php 
					if (strlen($imgChapitre) > 0){ 
						echo "<img src='../public/images/articles/".$imgChapitre."'>";
					}
				?>
				
				<?php echo $contentChapite; ?>

            </div>
        </section>