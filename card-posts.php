<div class="item 
    <?php 
        if ( $siteId == 204 || $isArchive == true){
            echo 'col-xs-6 col-ms-6 col-sm-4 col-md-3 col-lg-5ths';    
        } else {
            echo 'col-xs-6 col-ms-6 col-sm-4';
        }
    ?>

    ">
    <div class='card-posts'>
        <div class='card-posts__image'>
            <a href="<?php the_permalink(); ?>">
                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); $url = $image['0']; echo $url; ?>">
            </a>
        </div>
        <div class='card-posts__details'>
            <h4 class="card-posts__title">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>
            <p class='card-posts__description'>
                <?php echo rwmb_meta( 'ctdn_SubTitle' );?>
            </p>
        </div>
        <div class="card-posts__meta">
            <div class="card-posts__avatar" >
        		<?php echo get_wp_user_avatar( get_the_author_meta( 'ID' ), 'thumbnail', '', get_the_author() ); ?>
    		</div>
			<div class="card-posts__info">
				<div class="card-posts__name ellipsis">
				    <?php echo get_the_author(); ?>
				</div>
				<div class="card-posts__date ellipsis">
				    <?php echo 'vor '.human_time_diff( get_the_time('U'), current_time('timestamp') ); ?>
				</div>
			</div>
        </div>
    </div>
</div>
