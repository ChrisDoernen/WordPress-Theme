<?php
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $imageSize); 
	$url = $image["0"];
?>

<header class="header header-landing-page" style="background-image: url('<?php echo $url;?>')">
	<div class="container-fluid">
       <?php include (get_template_directory().'/navigation-row.php'); ?>
    </div>
    <?php
        if(rwmb_meta('aa_home_alert_message_activate')) : ?>
        <div class=" container-fluid alert-message">
            <?php echo rwmb_meta('aa_home_alert_message')?>
        </div>
    <?php endif; ?>	
    <div id="" class="fading welcome-area">
        <div class="welcome">
            <h1 class="welcome__title">WELCOME HOME
            <span class="welcome__subtitle">ARCHE Augsburg</span>
            </h1>
        </div>
    </div>
    <div class="translation fading">
        <div class="">
            <div class="translation__icon">
                <a href="<?php echo esc_url( home_url( '/' ) ).'english'; ?>">
                    <img class="img-responsive " src="<?php echo get_stylesheet_directory_uri(); ?>/img/TranslationBubbles2.jpg"></img>
                </a>
            </div>
            <div class="translation__text hidden-xs">
                <a href="<?php echo esc_url( home_url( '/' ) ).'english'; ?>">Welcome to <br> our church</a>
            </div>
        </div>
    </div>
    <a href="#" class=" fading scroll-down" address="true"><i class="fa fa-2x fa-angle-down"></i></a>
</header>