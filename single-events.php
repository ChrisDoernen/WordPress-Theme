<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php include (get_template_directory().'/head.php'); ?>
</head>

<body>
	<div class="siteContainer">
    
    <?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-events.php'); ?>   
    
    <section id="content" class="section event background-white diagonal-bottom">
		<div class="container">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
							<div class="">
								 <?php 
        							if ( rwmb_meta( 'ctdn_event_gx' ) != "") {
        								$args = array('size' => $imageSize,'type' => 'image');
        								$images = rwmb_meta( 'ctdn_event_gx', $args );
        								
        								if ( !empty( $images ) ) {
        									foreach ( $images as $image ) {
        										echo '
        											<img class="img-responsive event__graphics" src="'.$image['url'].'"></img>
        										';
        									}	
        								}
        							}	
        						?>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="event__infos">
    						    <?php 
    						        setlocale(LC_TIME, "de_DE.UTF-8");
									date_default_timezone_set('Europe/Berlin');
									$date = date_create();
									$start = rwmb_meta ('ctdn_event_start_datetime');
									$end = rwmb_meta ('ctdn_event_end_datetime');
									$startDate = substr(rwmb_meta ('ctdn_event_start_datetime'), 0, -6)/1000;
									$endDate = substr(rwmb_meta ('ctdn_event_end_datetime'), 0, -6)/1000;
									$startTimeHours = substr(rwmb_meta ('ctdn_event_start_datetime'), -5, 2);
									$startTimeMinutes = substr(rwmb_meta ('ctdn_event_start_datetime'), -2);
									$endTimeHours = substr(rwmb_meta ('ctdn_event_end_datetime'), -5, 2);
									$endTimeMinutes = substr(rwmb_meta ('ctdn_event_end_datetime'), -2);
									
									// Datum und Uhrzeit sind gleich
									if ($start === $end || $endDate == '')
									{
									    $datetime = strftime('%a, %d. %b', $startDate).', '.$startTimeHours.':'.$startTimeMinutes.' Uhr';
									    $endDate = $startDate;
									}
									// Uhrzeit unterscheidet sich
									elseif ($startDate === $endDate && $start != $end)
									{
									    $datetime = strftime('%a, %d. %b', $startDate).', '.$startTimeHours.':'.$startTimeMinutes.' Uhr - '.$endTimeHours.':'.$endTimeMinutes.' Uhr';
									}
									else 
									{
									    $startDayOfMonth = date('d', $startDate);
									    $startMonthOfYear = date('m', $startDate);
									    $startYear = date('Y', $startDate);
									    $endDayOfMonth = date('d', $endDate);
									    $endMonthOfYear = date('m', $endDate);
									    $endYear = date('Y', $endDate);
									    $nowYear = date('Y');
									    
									    $datetime = strftime('%d. %b', $startDate).', '.$startTimeHours.':'.$startTimeMinutes.' Uhr - '.strftime('%d. %b', $endDate).', '.$endTimeHours.':'.$endTimeMinutes.' Uhr';
									}
								?>
                                <? if($endDate+86400 < time()){ $isOver = true;?>
                                    <span class="event-over">
                                        <i class="fa fa-exclamation-circle"></i> 
                                        Das Event liegt in der Vergangenheit
                                    </span>
                                <?}?>
    						    <h5 class="event__date"><?php echo $datetime; ?></h5>
								<h1 id="" class='event__heading'><?php echo get_the_title();?></h1>
								<div class="event__location"><i class="fa fa-map-marker"></i>&nbsp;
								    <a href="https://www.google.de/maps/search/<?php echo str_replace("<br>", "", rwmb_meta ('ctdn_event_location')); ?>" class="event__link" target="_blank">
								        <?php echo rwmb_meta ('ctdn_event_location'); ?>
								    </a></div>
                                <?php
                                    $post = get_post($siteId);
                                    $content = apply_filters('the_content', $post->post_content);
                                    echo $content;
                                ?>
                                <?php
                                    $kb_start = date('Ymd', $startDate).'T'.$startTimeHours.$startTimeMinutes.'00';
                                    $kb_end = date('Ymd', $endDate).'T'.$endTimeHours.$endTimeMinutes.'00';
                                    $kb_current_time = '20161026T130000';
                                    $kb_title = html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8');
                                    $kb_location = preg_replace('/([\,;])/','\\\$1',str_replace("<br>", ", ",rwmb_meta ('ctdn_event_location'))); 
                                    $kb_description = html_entity_decode(strip_tags($content), ENT_COMPAT, 'UTF-8');
                                    $kb_url = get_permalink();
                                    $kb_file_name = date('Ymd', $startDate).'-'.html_entity_decode($slug);
                                    $fileName = '/www/htdocs/w00700fe/ical/'.$kb_file_name.'.ics';
                                    
                                    include (get_template_directory().'/ical-export.php');
                                ?>
                                <h6>Zu deinem Kalender hinzufügen <a href="https://de.wikipedia.org/wiki/ICalendar" target="_blank"><i class="fa fa-question-circle"></i></a></h6>
                                <a class="ical-link" href="http://termine.arche-augsburg.de/<? echo $kb_file_name; ?>">iCal-Link</a>
                                <?php echo do_shortcode('[shariff headline="<h6>Dieses Event teilen</h6>"]')?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 centered">
					<a href="<?php echo home_url();?>/events-termine" class="btn btn-default" role="button">zurück zu Events und Termine</a>
				</div>
			</div>
		</div>
	</section>
	
    <?php include (get_template_directory().'/footer.php'); ?> 
    
    </div>
</body>