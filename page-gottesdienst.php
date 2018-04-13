<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>

    <section id="intro" class="section section--less-margin background-white centered diagonal-top">
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
	
	<section class="section section- background-grey diagonal-top diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 centered">
							<h2 class="section__heading">Was dich erwartet</h2>
							<h3 class="pageSubTitle"></h3>
						</div>
					</div>
					<div class="row">
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-heartbeat fa-2x service__icon"></i>
                                <h4 class="service__heading">Lobpreis<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Wir lieben es, Gott gemeinsam durch Lieder anzubeten. Unser
                                        Stil ist geprägt von moderner Rock/Popmusik, unterstützt durch 
                                        zeitgemäße Licht- und Audiotechnik.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-book fa-2x service__icon"></i>
                                <h4 class="service__heading">Predigt<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Eine lebensnahe Botschaft, inspiriert durch ein überraschend zeitloses
                                        Buch - die Bibel. Meist von Andi, einem Mitglied des Leitungsteams oder 
                                        einem Gastsprecher.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-retweet fa-2x service__icon"></i>
                                <h4 class="service__heading">Gebet<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Gott ist gut! Er heilt und verändert. Gemeinsam bringen wir im Gebet
                                        unsere Bitten und unseren Dank für das, was er tut. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-comments fa-2x service__icon"></i>
                                <h4 class="service__heading">Gemeinschaft<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Zwischen den Gottesdiensten ist Zeit, bei Kaffee
                                        und Gebäck Freunde zu treffen. Auch der Sheridanpark ist
                                        ideal um Gemeinschaft und das Leben zu genießen.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-money fa-2x service__icon"></i>
                                <h4 class="service__heading">Spenden<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Geld ist eine Möglichkeit, anderen zu helfen. Weiterhin finanzieren wir uns 
                                        als Freikirche über Spenden. Es ist uns wichtig, dass Gäste sich nicht verpflichtet fühlen, etwas zu geben.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sx-12 col-sm-6">
                            <div class="service centered">
                                <i class="fa fa-child fa-2x service__icon"></i>
                                <h4 class="service__heading">Junge Menschen<h4>
                                <div class="service__text pKleiner">
                                    <p>
                                        Da viele Familen zu ARCHE-Gottesdiensten kommen, sind ca. 100
                                        Kinder und Jugendliche im Haus während des 9:30 Uhr-Gottesdienstes 
                                        nichts Ungewöhnliches. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
	
    <section id="" class="section- background-white">
		<div class="container container-ms">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 textCentered">
							<h2 class="section__heading">Kindergottesdienst</h2>
							<h3 class="pageSubTitle"></h3>
						</div>
					</div>
					<div class="row arche-kids">
						<div class="col-xs-12 col-sm-6">
							<div class='arche-kids__logo'></div>
						</div>
						<div class="col-xs-12 col-sm-6 pKleiner arche-kids__text">
							<p>Das ARCHE-Kids-Team bietet ein spannendes, kindgerechtes Programm für alle Alterklassen an. 
							ARCHE-Kids-Gruppenleiter tragen blaue T-Shirts mit dem ARCHE-Kids-Logo. Die Mitarbeiter an der Infothek im Foyer kennen die 
							Gruppenleiter und beantworten gerne weitere Fragen.</p>
						</div>
						<div class="col-xs-12 centered">
						    <a href="<?php echo esc_url( home_url( '/' ) ); ?>dabei-sein/arche-kids" class="btn btn-default" role="button">mehr Infos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="intro" class="section section--less-margin background-grey diagonal-top">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">  
					        <div class="sermon__archive-container clearfix">
					            <div class="sermon__archive-icon">
						            <i class="fa fa-2x fa-microphone"></i>
		                        </div>
                                <div class="sermon__archive-text">
                                    <a href="<?php echo esc_url( home_url( '/' ) ).'predigten'; ?>"> Neueste Predigten <br> zum Download</a>
                                </div>
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