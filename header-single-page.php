<?php		
	$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $imageSize); 
	$url = $image["0"];
?> 

<header class="header header-page" style="background-image: url('<?php echo $url ?>');">
	<div class="container-fluid">
        <?php include (get_template_directory().'/navigation-row.php'); ?>
	</div>  
</header>