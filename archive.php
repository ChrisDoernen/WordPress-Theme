<?php /* Template Name: Archiv */  ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="siteContainer">
	
	<?php $isArchive = true; ?>
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-parent-page.php'); ?>

    <section id="intro" class="sectionLessMargin background-grey">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 textCentered">
							<h1 class="pageTitle"><?php echo $cat_name; ?></h1>
							<h2>Alle Beiträge</h2>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="container container-ms">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<?php
    						$argu = array(
    							'post_type' => 'post',
    							'order' => 'DESC',
    							'category_name' => $cat_slug,
    							//'posts_per_page' => 5,
    						);
    						
    						$the_query = new WP_Query( $argu );
    
    						if ($the_query->have_posts()) 
    						{
    							while ($the_query->have_posts()) 
    							{
    								$the_query->the_post();
    								include (get_template_directory()."/card-posts.php");
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