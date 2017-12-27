<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
    
    <?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-events.php'); ?>
    
    <section id="content" class="post section section--less-margin background-white diagonal-bottom">
		<div class="container">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
	                <div class="row">
                		<div class="col-xs-12">
							<div class="job__date ">
								<span class="meta-info">
								    <?php echo get_the_date();?> 
								</span>
							</div>
						</div>
	                </div>
                	<div class="row">
                		<div class="col-xs-12">
							<div class="">
								 <h1 class='job__title left'><?php echo get_the_title();?></h1>
							</div>
						</div>
	                </div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 job__content">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
						<div class="col-xs-12 col-sm-4 job__meta-box">
							<?php $terms = get_the_terms($post->ID, "Job-Kategorie");
					            $count = count($terms);
					            if ( $count > 0 ){?>
					            	<p>
									<span class="job-meta-info">Kategorie:</span><br>
					                <?php foreach ( $terms as $term ) { ?>
					                    <span class="job-tag"> 
					                    <?php echo  $term->name; ?>
					                   </span> 
					            <?php } ?>
					            	</p>
					        <?php } ?>
							<?php $terms = get_the_terms($post->ID, "Arbeitsbereich");
					            $count = count($terms);
						            if ( $count > 0 ){ ?>
						            <p>
									<span class="job-meta-info">Arbeitsbereich:</span><br>
					                <?php foreach ( $terms as $term ) { ?>
					                    <span class="job-tag"> 
					                    <?php echo  $term->name; ?>
					                   </span> 
					            <?php } ?>
					            </p>
					       	<?php } ?>
					       	
					       	<?php if ( rwmb_meta ( 'ctdn_job_estimatedTime' ) != ''){?>
								<p>
									<span class="job-meta-info">ungefährer Aufwand:</span><br>
						            <span class="job-tag">
						               <?php echo rwmb_meta ( 'ctdn_job_estimatedTime' );?> h/Woche
						            </span>
					            </p>
					        <?php } ?>
						
							<?php if ( rwmb_meta ( 'ctdn_job_organizationalUnitLeader' ) != ''){?>
								<p>
									<span class="job-meta-info">Leiter/Kontaktperson:</span></br>
									<?php if ( rwmb_meta( 'ctdn_job_ouLeaderImage' ) != "") {
										echo "<img class='job__leaderImage' src=";
	        								$args = array('size' => 'thumbnail','type' => 'image');
	        								$images = rwmb_meta( 'ctdn_job_ouLeaderImage', $args );
	    									if ( !empty( $images ) ) {
	    										foreach ( $images as $image ) {
	    										    echo $image['url'];
	    										}
	    									} 
	    									echo ";'></img>";
    									}
    								?>
						            <?php echo rwmb_meta ( 'ctdn_job_organizationalUnitLeader' );?>
					            </p>
					        <?php } ?>
							
							
							<p><span class="job-meta-info">Zuletzt aktualisiert:</span><br>
								<?php echo get_the_date();?>
							</p>
						</div>
					</div>
					
    				<div class="row">
    				    <div class="col-xs-12">
                            <?php echo do_shortcode('[shariff headline="<h6>Diesen Job jemandem empfehlen</h6>"]')?>
                        </div>
    				</div>
				</div>
			</div>
		</div>
	</section>		

	<section id='' class='background-grey centered section--less-margin diagonal-top'>
	    <div class='container container-ms'>
	    	<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo home_url();?>/jobs" class="btn btn-default" role="button">zur Jobseite</a>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>
	
	<?php include (get_template_directory().'/footer.php'); ?> 
    
    </div>
</body>