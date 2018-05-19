<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>

    <section id="intro" class="section--less-margin background-white centered diagonal-top">
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
	
	<section class="centered background-grey diagonal-top diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="frontpageHeading">Leitungsteam</h1>
						</div>
					</div>
					<?php
						$leadershipAreaHtml = rwmb_meta( "aa_section_leadership" );
						echo $leadershipAreaHtml;
					?>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section centered background-white diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12">
						    <?php echo rwmb_meta('aa_section_3')?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<section class="section centered background-grey diagonal-top">
		<div class="container container-ms">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 multiBtn">
					<?php echo do_shortcode(rwmb_meta('aa_section_5'))?>
				</div>
			</div>
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
   	</div>
</body>