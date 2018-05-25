<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>

    <section id="intro" class="section section--less-margin background-white centered diagonal-top diagonal-bottom">
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
	
	<section id="form" class="section section--less-margin background-grey contact">
	    <div class='background'>
			<i class="background__icon fa fa-paper-plane fa-5x"></i>
		</div>
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 centered">
							<h1 class="frontpageHeading">Kontaktformular</h1>
							<h3 class="pageSubTitle"></h3>
						</div>
					</div>
					<div class="row">
					    <div class="col-xs-12 ">
					        <?php echo do_shortcode( '[contact-form-7 id="487" title="Formular Kontakt Seite"]' );?>
					    </div>
					</div>
				</div>
			</div>	
		</div>
	</section>
	
	<section id="contact" class="section background-white diagonal-top diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-ms-8 col-ms-offset-2 col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 centered">
							<h1 class="frontpageHeading">FCG ARCHE <br class="hidden-sm hidden-md hidden-lg">Augsburg e.V.</h1>
							<h2>Freikirche im Bund BFP K.d.ö.R</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<table class="contactTable">
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> 
			                            </span>
                            		</td>
                            		<td>
										FCG Arche Augsburg<br>
                            			Siegfried-Aufhäuser-Str. 19a <br>
                                		86157 Augsburg
                            		</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i> 
			                            </span>
									</td>
									<td>
										+49 821 / 258 9729
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> 
			                            </span>
									</td>
									<td>
										info@arche-augsburg.de
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-credit-card fa-stack-1x fa-inverse"></i> 
			                            </span>	
									</td>
									<td>
										Kreissparkasse Augsburg<br>
										IBAN: DE38 720 501 01 0380 351536 <br>
										BIC: BYLADEM1AUG <br>
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> 
			                            </span>	
									</td>
									<td>
										<a href="https://www.facebook.com/archeaugsburg/" target="_blank">facebook.de/archeaugsburg</a>
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-instagram fa-stack-1x fa-inverse"></i> 
			                            </span>	
									</td>
									<td>
										<a href="https://www.instagram.com/archeaugsburg/" target="_blank">instagram.de/archeaugsburg</a>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-xs-12 col-sm-6">
							<table class="contactTable">
							    <tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-user fa-stack-1x fa-inverse"></i> 
			                            </span>
									</td>
									<td>
										Pastor: Andi Neumann
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i> 
			                            </span>
									</td>
									<td>
										+49 821 / 258 972 9
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa-stack">
			                                <i class="fa fa-circle fa-stack-2x"></i>
			                                <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> 
			                            </span>
									</td>
									<td>
										andi.neumann@arche-augsburg.de
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="standort" class="section centered background-grey contact ">
		<div class='background'>
			<i class="background__icon fa fa-map-marker fa-5x"></i>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="frontpageHeading">Standort</h2>
							<h3 class="pageSubTitle"></h3>
						</div>
						<div class="col-xs-12 ">
						    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10603.696273242564!2d10.869848587245368!3d48.36198270182114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479ea2adeee597b7%3A0x2b88fae2ceb8dfd!2sFreie+Christengemeinde+Arche+Augsburg+e.V.!5e0!3m2!1sde!2sde!4v1483975103941" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="" class="section background-white diagonal-top diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 centered">
							<h1 class="frontpageHeading">Spenden</h1>
							<h3 class="pageSubTitle"></h3>
							<p class="pKleiner">Die ARCHE erhebt als Freikirche bewusst keine Kirchensteuer und ist daher
							auf die freiwillige Unterstützung der Mitglieder und Freunde angewiesen. Wenn du die ARCHE
							finanziell Unterstützen möchtest, kannst du das entweder im Gottesdienst, oder per 
							<a href="#contact">Banküberweisung</a> tun. Auf Wunsch wird namentlich bekannten Gebern am Jahresende 
							eine Spendenquittung ausgestellt. Wir danken allen Spendern sehr herzlich.</p>
						</div>
					</div>
					<div class="row">
					</div>
				</div>
			</div>	
		</div>
	</section>
		
	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>