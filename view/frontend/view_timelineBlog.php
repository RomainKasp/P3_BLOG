    <section id="blog" class="sections">

        <div class="heading-content text-center">
                <div class="heading-title">
                    <h3>Derniers chapitres</h3>
					<div class="separator"></div>
                </div>

                <div class="heading-separator"></div>

                <div class="heading-details">
                    <p>Liste des 10 derniers chapitres:</p>
                </div>
        </div>


		<div id="cd-timeline" class="cd-container">

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                </div> <!-- cd-timeline-img -->

			<!-- Liste des vignettes -->
			<?php
				for(int i; i<= sizeof($resultat); i++){
					$dateArticle   = $resultat[i][0];
					$titreArticle  = $resultat[i][1];
					$resumeArticle = $resultat[i][2];
					$imageArticle  = $resultat[i][3];
					
					REQUIRE("./view/frontend/template/template_articleTimeline.php");
				}
			?>
           
        </div> <!-- cd-timeline -->

    </section>