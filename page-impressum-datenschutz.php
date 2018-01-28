
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>
    
    <section class="content section--less-margin background-white diagonal-top diagonal-bottom">
		<div class="container">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                	<div class="row">
                		<div class="col-xs-12">
							<div class="">
								 <h1 id="" class='pageTitle'><?php echo get_the_title();?></h1>
							</div>
						</div>
	                </div>
					<div class="row">
						<div class="col-xs-12">
								
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
	
	 
    
    </div>
</body>