<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>

    <section id="intro" class="section--less-margin background-white textCentered diagonal-top">
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
	
	<section id="" class=" background-grey cssLineTop cssLineBottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 textCentered">
							<h2 class="frontpageHeading">Organisationen & Projekte</h2>
						</div>
					</div>
					<div class="row">
					    <?php 
					    
					    for ($i=1; $i<2; $i++){
                            $textfield = 'aa_partnertext'.$i;
                            $logofield = 'aa_partnerlogo'.$i;
                            $linkfield = 'aa_partnerlink'.$i;
					        if ( rwmb_meta( $logofield ) != "") {
								$args = array('size' => 'full','type' => 'image');
								$images = rwmb_meta( $logofield, $args );
								$url = reset($images)['url'];
								
					        }
					    echo '
    						<div class="col-xs-12 col-ms-12 col-sm-8">
    						    <div class="organisation">
        						    <div class="row">
        						        <div class="col-xs-12 col-ms-6 col-sm-6 ">
                							<div class="organisation1Image" style="background-image: url(';
                								if ( rwmb_meta( 'aa_partnerbild1' ) != "") {
                    								$args = array('size' => 'full','type' => 'image');
                    								$images = rwmb_meta( 'aa_partnerbild1', $args );
                									if ( !empty( $images ) ) {
                										foreach ( $images as $image ) {
                										    echo $image['url'];
                										}
                									}
                								}
											echo '
                							);"></div>
            							</div>
            						    <div class="col-xs-12 col-ms-6 col-sm-6">
                							<div class="">
                								<div class="organisation__image">
                									<img class="img-responsive" src="'.$url.'"></img>
                								</div>
                								<div class="organisation__text pKleiner">
                									<span class="leadershipName"></span><br>
                									<p>';
                									  echo rwmb_meta( $textfield );
                									    echo '
                									</p>
                									
                								</div>
                							</div>
            							</div>
            						</div>
            					</div>
    						</div>';
					    }
						?>
					    <?php 
					    
					    for ($i=2; $i<5; $i++){
                            $textfield = 'aa_partnertext'.$i;
                            $logofield = 'aa_partnerlogo'.$i;
                            $linkfield = 'aa_partnerlink'.$i;
					        if ( rwmb_meta( $logofield ) != "") {
								$args = array('size' => 'full','type' => 'image');
								$images = rwmb_meta( $logofield, $args );
								$url = reset($images)['url'];
								
					        }
					    echo '
    						<div class="col-xs-12 col-ms-6 col-sm-4">
    							<div class="organisation">
    								<div class="organisation__image">
    									<img class="img-responsive" src="'.$url.'"></img>
    								</div>
    								<div class="organisation__text pKleiner">
    									<span class="leadershipName"></span><br>
    									<p>';
    									  echo rwmb_meta( $textfield );
    									    echo '
    									</p>
    									
    								</div>
    							</div>
    						</div>';
					    }
						?>
						<?php
    					    for ($i=5; $i<6; $i++)
    					    {
                                $textfield = 'aa_partnertext'.$i;
                                $linkfield = 'aa_partnerlink'.$i;
    					        if (rwmb_meta($logofield ) != "") {
    								$args = array('size' => 'full','type' => 'image');
    								$images = rwmb_meta($logofield, $args);
    								$url = reset($images)['url'];
					        }
					    echo '
    						<div class="col-xs-12 col-ms-6 col-sm-4">
    						    <div class="organisation">
        						    <div class="organisation5ImageContainer">
            							<div class="organisation5Image" style="background-image: url(';
            								if (rwmb_meta( 'aa_partnerbild5' ) != "")
            								{
                								$args = array('size' => 'full','type' => 'image');
                								$images = rwmb_meta( 'aa_partnerbild5', $args );
            									if (!empty($images)) {
            										foreach ($images as $image)
            										{
            										    echo $image['url'];
            										}
            									}
            								}
    									echo '
            							);"></div>
            						</div>
        							<div class="">
        								<div class=" pKleiner">
        									<span class="leadershipName"></span><br>
        									<p>';
        									  echo rwmb_meta($textfield);
        									    echo '
        									</p>
        									
        								</div>
        							</div>
            					</div>
    						</div>';
					    }
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="" class="background-white ">
		<div class="container container-ms">
			<div class="row">
				<div class="textCentered col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="frontpageHeading">Weitere Infos</h2>
							<h3 class="pageSubTitle"></h3>
						</div>
						<div class="col-xs-12 ">
						<p>Wenn du mehr über Möglichkeiten erfahren möchtest, Partnerprojekte zu 
						unterstützen, freuen wir uns auf deine Nachricht. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
					<div class="row">
						<?php 
                    		if (rwmb_meta('aa_authorleader_image') != "") 
                    		{
                                $args = array('size' => 'medium','type' => 'image');
                                $images = rwmb_meta('aa_authorleader_image', $args);
                    			if (!empty($images )) 
                    			{
                    				$imageUrl = reset($images)['url'];
                    			    include (get_template_directory().'/contact-avatar.php');
                                }
                            }
                        ?>
					</div>
					<div class="row">
						<div class="col-xs-12 ">
							<div class='textCentered'>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>kontakt?your-subject=Infos+zu+Helfen+und+Geben&recipient=Marie+Beck+-+Helfen+und+Geben#form" class="btn btn-default" role="button">KONTAKT</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php include (get_template_directory().'/footer.php'); ?> 
	
   	</div>
</body>