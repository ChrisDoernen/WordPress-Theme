<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
	<?php include (get_template_directory().'/header-single-page.php'); ?>
	
	<section id="secGroups" class="section section--less-margin background-white centered diagonal-top">
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
								<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" default-loaded-posts="4" actual-loaded-posts="0" method="POST" id="filter">
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
									<input type="hidden" name="action" value="jobfilter">
								</form>
							</div>
						</div>
					</div>
					
					<div id="jobs-container" class="row">
					
    					
					</div>
					
					<div class="row">
						<?php if( true ) {?>
							<div class="col-xs-12 centered">
							    <a id="load-more" href="" class="btn btn-default" role="button">mehr laden</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 

    </div>
    
    <script type="text/javascript" src="<?php echo (get_template_directory_uri().'/js/scripts-jobs.js');?>"></script>
</body>