<?php
	if (strlen($imageArticle) > 0){
		$temp_artTime="<div class='cd-timeline-block'>
                <div class='cd-timeline-img cd-location'>
                </div> <!-- cd-timeline-img -->

                <div class='cd-timeline-content'>
					<p>".$dateArticle."</p>
                    <h2>".$titreArticle."</h2>
                    <p>".$resumeArticle."</p>
                    <a href='#0' class='cd-read-more'>Lire la suite...</a>
                    <span class='cd-date'><img src='".$imageArticle."' alt='timeline' /></span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->";
	}else{		
		$temp_artTime="<div class='cd-timeline-block'>
                <div class='cd-timeline-img cd-location'>
                </div> <!-- cd-timeline-img -->

                <div class='cd-timeline-content'>
					<p>".$dateArticle."</p>
                    <h2>".$titreArticle."</h2>
                    <p>".$resumeArticle."</p>
                    <a href='#0' class='cd-read-more'>Lire la suite...</a>
                </div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->";
	}