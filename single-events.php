<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php include (get_template_directory().'/head.php'); ?>
</head>

<body>
	<div class="site-container">
    
    <?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-events.php'); ?>   
    
    <section id="content" class="section event background-white diagonal-bottom">
		<div class="container container-ms">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
							<div class="">
								 <?php 
        							if ( rwmb_meta( 'aa_event_gx' ) != "") {
        								$args = array('size' => $imageSize,'type' => 'image');
        								$images = rwmb_meta( 'aa_event_gx', $args );
        								
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
									$date = date_create();
									$showDateOnly = (rwmb_meta('aa_event_show_date_only')); 
									$start = (rwmb_meta('aa_event_start_datetime') !== '') 
										? date_create_from_format('Ymd, G:i', rwmb_meta('aa_event_start_datetime'))
										: false;
									
									$end = (rwmb_meta('aa_event_end_datetime') !== '')
										? date_create_from_format('Ymd, G:i', rwmb_meta ('aa_event_end_datetime'))
										: false;
									
									// If there is no start, we can not display it.
									if(empty($start)) 
									{
										$datetime = false;
									}
									// Start and end are the same or no end provided
									elseif (empty($end) || $start === $end) 
									{
										if ($showDateOnly == 0){
									    	$datetime = strftime('%a, %d. %b, %H:%M Uhr', $start->getTimestamp());
										}
										else {
											$datetime = strftime('%a, %d. %b', $start->getTimestamp());
										}
									    $end = $start; // isOver flag relies on end so we need it
									}
									// Start and end date are the same, time is different
									elseif ($start->format('Ymd') == $end->format('Ymd')) 
									{
										if ($showDateOnly == 0){
									    	$datetime = strftime('%a, %d. %b, %H:%M', $start->getTimestamp()).' - '.strftime('%H:%M Uhr', $end->getTimestamp());
										}
										else {
											$datetime = strftime('%a, %d. %b', $start->getTimestamp());
										}
									}
									// Start and end have different dates
									else 
									{
										if ($showDateOnly == 0){
									    	$datetime = strftime('%a, %d. %b, %H:%M Uhr', $start->getTimestamp()).' - '.strftime('%a, %d. %b, %H:%M Uhr', $end->getTimestamp());
										}
										else {
											$datetime = strftime('%a, %d. %b', $start->getTimestamp()).' - '.strftime('%a, %d. %b', $end->getTimestamp());
										}
									}
								?>
                                <?php if($end->getTimestamp() < time()){ $isOver = true;?>
                                    <span class="event-over">
                                        <i class="fa fa-exclamation-circle"></i> 
                                        Das Event liegt in der Vergangenheit. 
                                    </span>
                                <?php }?>
                                <?php if(!empty($datetime)){?>
	                               <h5 class="event__date"><?php echo $datetime; ?></h5>
								<?php }?>
								<h1 id="" class='event__heading'><?php echo get_the_title();?></h1>
								<div class="event__location">
									<i class="fa fa-map-marker"></i> &nbsp;
								    <a href="https://www.google.de/maps/search/<?php echo str_replace("<br>", "", rwmb_meta ('aa_event_location')); ?>" class="event__link" target="_blank">
								        <?php echo rwmb_meta ('aa_event_location'); ?>
								    </a>
								</div>
                                <?php
                                    $post = get_post($siteId);
                                    $content = apply_filters('the_content', $post->post_content);
                                    echo $content;
                                ?>
                                <?php
                                	if(!empty($datetime))
                                	{
	                                    $kb_start = strftime('%Y%m%dT%H%M%S', $start->getTimestamp());
	                                    $kb_end = strftime('%Y%m%dT%H%M%S', $end->getTimestamp());
	                                    $kb_current_time = '20161026T130000';
	                                    $kb_title = html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8');
	                                    $kb_location = preg_replace('/([\,;])/','\\\$1',str_replace("<br>", ", ",rwmb_meta ('aa_event_location'))); 
	                                    $kb_description = html_entity_decode(strip_tags($content), ENT_COMPAT, 'UTF-8');
	                                    $kb_url = get_permalink();
	                                    $kb_file_name = date('Ymd', $startDate).'-'.html_entity_decode($slug);
	                                    $fileName = get_home_path().'/../live_ical/'.$kb_file_name.'.ics';
	                                    
	                                    include (get_template_directory().'/ical-export.php');
                                ?>
                                <h6>Zu deinem Kalender hinzufügen <a href="https://de.wikipedia.org/wiki/ICalendar" target="_blank"><i class="fa fa-question-circle"></i></a></h6>
                                <?php } ?>
                                <a class="ical-link" href="http://termine.arche-augsburg.de/<? echo $kb_file_name; ?>">iCal-Link</a>
                                
                                <?php echo do_shortcode('[shariff headline="<h6>Dieses Event teilen</h6>"]')?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section section--less-margin centered background-grey diagonal-top">
		<div class="container container-ms">	
			<div class="row">
				<div class="col-xs-12 centered">
				    <a href="<?php echo esc_url( home_url( '/' ) ).'events-termine/'; ?>" class="btn btn-default" role="button">Events & Termine</a>
				</div>
			</div>	
		</div>
	</section>
	
    <?php include (get_template_directory().'/footer.php'); ?> 
    
    </div>
</body>
