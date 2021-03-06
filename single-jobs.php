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
								<?php echo the_modified_date();?>
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
						<div class="col-xs-12 col-sm-8 ">
							<div class="row">
								<div class="col-xs-12 job__content">
									<?php
										$post = get_post($siteId);
										$content = apply_filters('the_content', $post->post_content);
										echo $content;
									?>
								</div>
							</div>
							<div class="row">
		    				    <div class="col-xs-12">
		                            <?php echo do_shortcode('[shariff services="whatsapp|mailto" headline="<h6>Diese Aufgabe jemandem empfehlen</h6>"]')?>
		                        </div>
		    				</div>
		    			</div>
						<div class="col-xs-12 col-sm-4 job__meta-box-container">
							<div class="job__meta-box">
								<div class="job-info-icon ">
									<i class="fa fa-5x fa-info-circle"></i>
								</div>
								<?php $terms = get_the_terms($post->ID, "Job-Kategorie");
						            $count = count($terms);
						            if ( $count > 0 ){?>
						            	<p>
										<span class="job-meta-info">Kategorie</span><br>
						                <?php foreach ( $terms as $term ) { ?>
						                    <span class=""> 
						                    <?php echo  $term->name; ?>
						                   </span> 
						            <?php } ?>
						            	</p>
						        <?php } ?>
								<?php $terms = get_the_terms($post->ID, "Arbeitsbereich");
						            $count = count($terms);
							            if ( $count > 0 ){ ?>
							            <p>
										<span class="job-meta-info">Arbeitsbereich</span><br>
						                <?php foreach ( $terms as $term ) { ?>
						                    <span class=""> 
						                    <?php echo  $term->name; ?>
						                   </span> 
						            <?php } ?>
						            </p>
						       	<?php } ?>
						       	
						       	<?php if ( rwmb_meta ( 'aa_job_estimated_time' ) != ''){?>
									<p>
										<span class="job-meta-info">Zeitaufwand</span><br>
							            <span class="">
							               ca. <?php echo rwmb_meta ( 'aa_job_estimated_time' );?>h/Woche
							            </span>
						            </p>
						        <?php } ?>
							
								<?php if ( rwmb_meta ( 'aa_job_ou_leader' ) != ''){?>
									<p>
										<span class="job-meta-info">Kontakt</span></br>
										<?php if ( rwmb_meta( 'aa_job_ou_leader_image' ) != "") {
											echo "<img class='job__leaderImage' src=";
		        								$args = array('size' => 'thumbnail','type' => 'image');
		        								$images = rwmb_meta( 'aa_job_ou_leader_image', $args );
		    									if ( !empty( $images ) ) {
		    										foreach ( $images as $image ) {
		    										    echo $image['url'];
		    										}
		    									} 
		    									echo ";'></img>";
	    									}
	    								?>
							            <?php echo rwmb_meta ( 'aa_job_ou_leader' );?>
						            </p>
						        <?php } ?>
								
								
								<p><span class="job-meta-info">Zuletzt aktualisiert</span><br>
									<?php echo the_modified_date();?>
								</p>
							</div>
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
							<a href="<?php echo home_url();?>/mitarbeiten" class="btn btn-default" role="button">zur Übersichtsseite</a>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>
	
	<?php include (get_template_directory().'/footer.php'); ?> 
    
    </div>
</body>