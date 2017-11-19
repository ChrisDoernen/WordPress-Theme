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
					<div class="row">
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildUrbanBeck.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Urban Beck</span><br>
									<span class="leadership__position">Gemeindeleiter</span><br>
									<span class="leadership__position">1. Vorsitzender</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildAndiNeumann.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Andi Neumann</span><br>
									<span class="leadership__position">Pastor</span><br>
									<span class="leadership__position">2. Vorsitzender</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildUdoFuhrmann.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Udo Fuhrmann</span><br>
									<span class="leadership__position">Finanzen und Schriftführung</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildEmilPersson.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Emil Persson</span><br>
									<span class="leadership__position">Diakon</span><br>
									<span class="leadership__position">&nbsp;</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildMarieLuiseFrost.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Marie-Luise Frost</span><br>
									<span class="leadership__position">Diakonin</span><br>
									<span class="leadership__position">&nbsp;</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildBrigitteBinswanger2.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Brigitte Binswanger</span><br>
									<span class="leadership__position">Diakonin</span><br>
									<span class="leadership__position">&nbsp;</span>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-ms-4 col-sm-3">
							<div class="leadership">
								<div class="leadership__image">
									<img class="img-responsive" src="https://arche-augsburg.de/wp-content/uploads/ProfilbildBerndFrost1.jpg"></img>
								</div>
								<div class="leadership__info">
									<span class="leadership__name">Bernd Frost</span><br>
									<span class="leadership__position">Missionar</span><br>
									<span class="leadership__position">&nbsp;</span>
								</div>
							</div>
						</div>
					</div>
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
						    <?php echo rwmb_meta('ctdn_section_3')?>
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
					<?php echo do_shortcode(rwmb_meta('ctdn_section_5'))?>
				</div>
			</div>
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
   	</div>
</body>