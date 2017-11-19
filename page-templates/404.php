<?php /* Template Name: 404 */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php include (get_template_directory().'/head.php'); ?>
</head>

<body>
	
	<?php include (get_template_directory().'/navigation.php'); ?>
	<?php include (get_template_directory().'/header-parent-page.php'); ?>
    
    <section id="intro" class="section section--less-margin background-white centered">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
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
	</section>
    
    <?php include (get_template_directory().'/footer.php'); ?>
</body>