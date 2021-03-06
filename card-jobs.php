<div class="col-xs-12 left">
    <div class="job">
        
        <a href="<?php the_permalink(); ?>">
            <h3><?php echo get_the_title(); ?></h3>
        </a>
    
        <p>
            <?php echo rwmb_meta ( 'aa_job_desc' ); ?>
        </p>
        
        <?php $terms = get_the_terms(get_the_ID(), "Job-Kategorie");
            $count = count($terms);
            if ( $count > 0 ){
                foreach ( $terms as $term ) { ?>
                    <span class="job-tag"> 
                    <?php echo  $term->name; ?>
                   </span> 
            <?php }
        } ?>
        
        <?php $terms = get_the_terms(get_the_ID(), "Arbeitsbereich");
            $count = count($terms);
            if ( $count > 0 ){
                foreach ( $terms as $term ) { ?>
                    <span class="job-tag"> 
                    <?php echo  $term->name; ?>
                   </span> 
            <?php }
        } ?>
        
        <?php if ( rwmb_meta ( 'aa_job_estimated_time' ) != ''){?>
            <span class="job-tag ">
                ca. <?php echo rwmb_meta ( 'aa_job_estimated_time' );?>h/Woche
            </span>
        <?php } ?>
        
    </div>
</div>