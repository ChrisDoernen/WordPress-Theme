<div class="item col-xs-6 col-ms-6 col-sm-4 col-md-4 col-lg-4 ">
    <div class='card-pages'>
        <div class='card-pages__image'>
            <a href="<?php the_permalink(); ?>">
                <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); $url = $image['0']; echo $url; ?>">
            </a>
        </div>
        <div class='card-pages__details'>
            <h4 class="card-pages__title">
                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>
            <p class='card-pages__description'>
                <?php echo rwmb_meta( 'ctdn_card_description' );?>
            </p>
        </div>
    </div>
</div>