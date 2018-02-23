<?php
	$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $imageSize); 
	$url = $image["0"];
?>

<header class="header header-page" style="background-image: url('<?php echo $url ?>');">
	<div class="container-fluid">
        <?php include (get_template_directory().'/navigation-row.php'); ?>
	</div>  
	
	<?php
		if (!empty(rwmb_meta('aa_group_logo'))) 
		{
			echo "<div class='group-logo'>
			<img class='img-responsive' src='";
			
			$args = array('size' => 'full','type' => 'image');
			$images = rwmb_meta('aa_group_logo', $args);
			if (!empty($images)) 
			{
				foreach ($images as $image) 
				{
					echo $image['url'];
				}
			}
			echo "'></img>
				</div>";
		}		
	?>
</header>