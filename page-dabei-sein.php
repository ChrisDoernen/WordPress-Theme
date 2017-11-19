<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
	<?php include (get_template_directory().'/header-parent-page.php'); ?>
	
	<section id="secGroups" class="section section--less-margin centered">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<?php
    						$argu = array(
    							'post_type' => 'page',
    							'post__in' => array (13, 9, 16, 18, 21, 23, 25, 27),
    							'orderby' => 'menu_order',
    							'order' => 'ASC',
    						);
    						
    						$the_query = new WP_Query($argu);
    						if ($the_query->have_posts()) 
    						{
    							while ($the_query->have_posts()) 
    							{
    								$the_query->the_post();
    								include (get_template_directory()."/card-pages.php");
    							} 
    						    wp_reset_postdata();
    						} 
    						else 
    						{
    							echo "nichts"; // no posts found
    						}
    					?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 

    </div>
</body>