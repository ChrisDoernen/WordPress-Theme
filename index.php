<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">

	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-startseite.php'); ?>
    
    <section id="featured" class="background-dark ">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="row featured">
						<div class='featured__content '>
							<div class='featured__image pull-left'>
								<?php
									$i=0;
									$args = array('size' => 'medium','type' => 'image');
									$images = rwmb_meta('aa_home_featured_image', $args);
									if (!empty($images)) {
										foreach ( $images as $image ) {
											echo '<img class="img-responsive" src="'.$image['url'].'"></img>';
										}
									};
								?>
							</div>
							<div class='featured__heading pull-left'>
								<a href="<?php echo rwmb_meta('aa_home_featured_link'); ?>">
								    <span><?php echo rwmb_meta ('aa_home_featured_text'); ?></span>
								    <?php echo rwmb_meta ('aa_home_featured_subtext'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>    
    
    <section id="ueberUns" class="scroll-to background-white centered diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="section__heading">
								Willkommen zuhause 
							</h2>
							<h3 class="section__subheading"> </h3>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">
							<p> 
							Die ARCHE Augsburg ist eine evangelische Freikirche im Sheridanpark.
						    Wenn du mehr darüber erfahren möchtest, was uns als Kirche begeistert und verbindet, klicke hier oder schau' im Gottesdienst vorbei.
							</p>
							<a href="<?php echo esc_url( home_url( '/' ) ).'ueber-uns'; ?>" class="btn btn-default" role="button">Über uns</a>
							<a href="<?php echo esc_url( home_url( '/' ) ).'gottesdienst'; ?>" class="btn btn-default" role="button">Gottesdienst</a>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
	
	<section id="newsEvents" class="background-grey diagonal-bottom <? if($isMobilePhone){echo 'centered';}?>">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6 ">
							<div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel">
								<?php
									$argu = array(
        							    'post_type' => 'events',
                                        'orderby' => 'menu_order',
                                        'order' => 'DESC',
                                        'tax_query' => array(
                                        array(
                                            'taxonomy' => 'Werbekanäle',
        								    'field' => 'slug',
        								    'terms' => 'homepage-startseite',
                                            ),
                                        )
                                    );
									
									$anz = 0;
									$featuredImages = array();
									$featuredImagesLink = array();
									
									$the_query = new WP_Query ( $argu );
				
									if ( $the_query->have_posts() ) {
										while ( $the_query->have_posts() ) {
											$the_query->the_post();
											$start = rwmb_meta('aa_event_start_datetime');
	                                        $end = rwmb_meta('aa_event_end_datetime');
	                                        
	                                        // Start and end date are the same
	    									if (empty($end) || date('Ymd', $start) == date('Ymd', $end)) 
	    									{
	                                            $end = $start;
	                                        }
											if ($end < time()) {
												continue;
											}
											
											$link = get_permalink();
											$args = array('size' => 'medium','type' => 'image');
											$images = rwmb_meta( 'aa_event_gx', $args );
											reset($images);
											$firstKey = key($images);
											$featuredImages[$anz] = $images[$firstKey]['url'];
											$featuredImagesLink[$anz] = $link;
											$anz++;
										}
									    wp_reset_postdata();
									} 
									else 
									{
										$anz = 0; // no posts found
									}
								?>	
								
								<!-- Indicators -->
								 <ol class="carousel-indicators">
									 <?php
										$n=0;
										while ($n <= $anz - 1) 
										{
											echo "<li data-target='#myCarousel' data-slide-to='".$n."'";
											if ($n == 0) 
											{
												echo " class='active'";
											};
											echo "></li>";
											$n++;
										}
									 ?> 
								 </ol>

								 <!-- Wrapper for slides -->
								 <div class="carousel-inner" role="listbox">
									<?php
										if ( !empty( $featuredImages ) ) {
											foreach ( $featuredImages as $key => $value ) {
												echo '<div class="item';
												if ($key == 0){
													echo  ' active';
												};
												echo '">
													  <a href="'.$featuredImagesLink[$key].'"><img src="'.$value.'" alt=""></a>
													</div>
												';
											}
										}
									?>
								 </div>

							  <!-- Left and right controls -->
							  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="">
								<h3 class="section__heading">
									Events & Termine
								</h3>
								<h3 class="section__subheading"> </h3>
								<p>
								    Hier findest du alle Termine und Veranstaltungen im Überblick.
								</p>
								<a href="<?php echo esc_url( home_url( '/' ) ).'events-termine'; ?>" class="btn btn-default" role="button">zum Kalender</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<!--
	<section id="blog" class="background-grey">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="">
                        <div class="row">
                            <div class="col-xs-12 centered">
                                <h3 class="section__heading section__heading--inverse-color">
                                    News & Blog
                                </h3>
                                <h3 class="section__subheading"></h3>
                                <p class="inverse-color">Aktuelles aus dem Gemeindeleben</p>
                                <a href="" class="btn btn-default btn-inverse-color" role="button">zum Blog</a>	
                            </div>
						</div>
						<div class="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	-->
	<section id='dabeiSein' class='background-white centered diagonal-top diagonal-bottom-reverse'>
	    <div class='container container-ms'>
	        <div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="">
						<h3 class="section__heading">
							Dabei sein
						</h3>
						<h3 class="section__subheading">Gruppen in der ARCHE</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
			        <div class="row">
    				    <?php
    				        $featuredPages = array (9, 13, 16,);
    						if($numberContentCards == 2)
    						{
    						    array_push($featuredPages, 21);
    						}
    				        
    						$argu = array(
    							'post_type' => 'page',
    							'post__in' => $featuredPages,
    							'orderby' => 'menu_order',
    							'order' => 'ASC',
    						);
    						
    						$the_query = new WP_Query( $argu );
    
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
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<a href="<?php echo esc_url( home_url( '/' ) ).'dabei-sein'; ?>" class="btn btn-default" role="button">Alle Gruppen</a>
				</div>
			</div>
	    </div>
	</section>
	
	<section id="wachsen" class="background-grey">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="centered">
						<div class="row">
						    <div class="col-xs-12">
    							<h3 class="section__heading">
    								Dein nächster Schritt
    							</h3>
    							<h3 class="section__subheading">Kurse & Angebote</h3>
    							<p class="">
    								Egal ob du gläubig oder auf der Suche nach Gott bist,<br class="hidden-xs"> mach deinen nächsten Schritt. 
    							</p>
    						</div>
						</div>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 multiBtn">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/alpha-kurs" class="btn btn-default btn-oneline" role="button">alpha-Kurs </a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/welcome-to-church-party" class="btn btn-default " role="button">Welcome To <br>Church Party</a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/kleingruppen" class="btn btn-default " role="button">Kleingruppe <br> finden</a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/taufe" class="btn btn-default btn-oneline" role="button">Taufe </a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/mitarbeit" class="btn btn-default btn-oneline" role="button">Mitarbeit</a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt/gebet-und-gespraech" class="btn btn-default" role="button">Gebet und<br> Gespräch</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<section class="newsletter background-white diagonal-top-reverse ">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="row">
					    <div class="col-sm-6 col-sm-push-6">
					        <div><strong>Bleib in Verbindung.</strong><br> Mit dem ARCHE-Newsletter bekommst du alle Termine 
					        regelmäßig direkt in dein Email-Postfach. 
					        <br>
					        </div>
					        <!-- Begin MailChimp Signup Form -->
                                <div id="mc_embed_signup">
                                <form action="https://arche-augsburg.us9.list-manage.com/subscribe/post?u=a5275cd120ef312863a46429d&amp;id=5425da3d2d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                <div class="mc-field-group">
                                	<input type="email" value="" name="EMAIL" class="required email" placeholder="Deine Mailadresse" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                	<input type="text" value="" name="FNAME" class="required name" placeholder="Dein Vorname" id="mce-FNAME">
                                </div>
                                	<div id="mce-responses" class="clear">
                                		<div class="response" id="mce-error-response" style="display:none"></div>
                                		<div class="response" id="mce-success-response" style="display:none"></div>
                                	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a5275cd120ef312863a46429d_5425da3d2d" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Newsletter abonnieren" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                                </div>
                            <!--End mc_embed_signup-->
					    </div>
					    <div class=" col-sm-6 col-sm-pull-6">
					        <div class="newsletter-iphone">
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