<div class="col-xs-6 col-ms-6 col-sm-4 left">
    <div class="job">
        
        
        <h3><?php echo get_the_title(); ?></h3>
        
        <p>
            <?php echo rwmb_meta ( 'ctdn_job_desc' ); ?>
        </p>
        
        <?php $terms = get_terms("Job-Kategorie");
            $count = count($terms);
            if ( $count > 0 ){
                foreach ( $terms as $term ) { ?>
                    <span class="job__category"> 
                    <?php echo  $term->name; ?>
                   </span> 
            <?php }
        } ?>
        
        <?php if ( rwmb_meta ( 'ctdn_job_estimatedTime' ) != ''){?>
            <span class="job__time">
                ca. <?php echo rwmb_meta ( 'ctdn_job_estimatedTime' );?> h/Woche
            </span>
        <?php } ?>
        
        
            
    </div>
</div>