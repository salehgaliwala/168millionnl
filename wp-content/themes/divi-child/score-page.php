<?php
/*
Template Name: Individual score page
*/
wp_head(); ?>
<style>
    #main-content .container:before{width:0px}
</style>    
<div id="et-main-area">

    <div id="main-content">


        <div class="container">
            <div id="content-area" class="clearfix">
                
                    <?php
         while ( have_posts() ) : the_post(); 
            echo '<div class="entry-content">';
                the_content();
                // Define the MD5 hash to check against
                $target_md5 = $_GET['code'];

                // Loop through numbers from 0 to 3000
                for ($i = 0; $i <= 3000; $i++) {
                    // Calculate the MD5 hash for the current number
                    $current_md5 = md5($i);

                    // Check if the current MD5 hash matches the target MD5 hash
                    if ($current_md5 === $target_md5) {      
                        echo '<h2 style="text-align:center">Scores for Project Number '.$i.'</h2>';         
                        $j = $i+1;              
                        echo do_shortcode("[scores group='".$i."-".$j."']");                  
                        break; // Exit the loop if a match is found
                    }
                }
            echo '</div>';
        endwhile;
        ?>
                    </main>
                
            </div>
        </div>
    </div>
    <?php
wp_footer();