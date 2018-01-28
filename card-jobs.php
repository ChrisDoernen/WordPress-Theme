<div class="col-xs-12 left">
    <div class="job">
        
        <a href="<?php the_permalink(); ?>">
            <h3><?php echo get_the_title(); ?></h3>
        </a>
    
        <p>
            <?php echo rwmb_meta ( 'ctdn_job_desc' ); ?>
        </p>
        
        <?php $terms = get_the_terms($post->ID, "Job-Kategorie");
            $count = count($terms);
            if ( $count > 0 ){
                foreach ( $terms as $term ) { ?>
                    <span class="job-tag"> 
                    <?php echo  $term->name; ?>
                   </span> 
            <?php }
        } ?>
        
        <?php $terms = get_the_terms($post->ID, "Arbeitsbereich");
            $count = count($terms);
            if ( $count > 0 ){
                foreach ( $terms as $term ) { ?>
                    <span class="job-tag"> 
                    <?php echo  $term->name; ?>
                   </span> 
            <?php }
        } ?>
        
        <?php if ( rwmb_meta ( 'ctdn_job_estimatedTime' ) != ''){?>
            <span class="job-tag ">
                <?php echo rwmb_meta ( 'ctdn_job_estimatedTime' );?>h
            </span>
        <?php } ?>
        
        
            
    </div>
</div>