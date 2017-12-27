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
	</section>
	
	<section class="section section--less-margin background-grey diagonal-top">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12">
							<div class='job-filter'>
								<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
									<select name="category-filter">
										<option>alle Kategorien</option>
										<?php
											$terms = get_terms( array(
											    'taxonomy' => 'Job-Kategorie',
											    'hide_empty' => true,
											) );
											
											foreach ($terms as $term) {
												echo "<option value=".$term->term_id.">".$term->name."</option>";
											}
										?>
									</select>
									<select name="ou-filter">
										<option>alle Bereiche</option>
										<?php
											$terms = get_terms( array(
											    'taxonomy' => 'Arbeitsbereich',
											    'hide_empty' => true,
											) );
											
											foreach ($terms as $term) {
												echo "<option value=".$term->term_id.">".$term->name."</option>";
											}
										?>
									</select >
									<button>aktualisieren</button>
									<input type="hidden" name="action" value="myfilter">
								</form>
							</div>
						</div>
					</div>
					
					<div id="ajax-response" class="row">
						<?php
    						$argu = array(
    							'post_type' => 'jobs',
    						);
    						
    						$the_query = new WP_Query($argu);
    						if ($the_query->have_posts()) 
    						{
    							while ($the_query->have_posts()) 
    							{
    								$the_query->the_post();
    								include (get_template_directory()."/card-jobs.php");
    							} 
    						    wp_reset_postdata();
    						} 
    						else 
    						{
    							echo "Momentan gibt es keine Jobs."; // no posts found
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