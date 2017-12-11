<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-single-page.php'); ?>
	
	<section id="secGroups" class="section section--less-margin background-white diagonal-top">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 centered">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
					<div class="row">
                        <div class="">
                            <?php 
                                $argu = array(
                                    'post_type' => 'events',
                                    'orderby' => 'meta_value_num', 
                                    'meta_key'=> 'ctdn_event_start_datetime',
                                    'order' => 'ASC',
                                    'meta_value' => strftime('%Y%m%d, 00:00', strtotime("-2 week")),
                                    'meta_compare' => '>',
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'Anzeigeeinstellungen',
                                        'field' => 'slug',
                                        'terms' => 'news-and-events',
                                        ),
                                    )
                                );
                                
    							$the_query = new WP_Query ($argu);
    							if ($the_query->have_posts())
    							{
    							    $globalMonth;
    							    
    								while ($the_query->have_posts()) 
    								{
                                        $the_query->the_post();
                                        $link = get_permalink();
                                        
                                        $args = array('size' => 'medium','type' => 'image');
                                        $images = rwmb_meta('ctdn_event_gx', $args);
                                        reset($images);
                                        $firstKey = key($images);
                                        $url = $images[$firstKey]['url'];
                                        $title = get_the_title();
                                        
                                        $date = date_create();
                                        $start = date_create_from_format('Ymd, G:i', rwmb_meta('ctdn_event_start_datetime'));
                                        $end = date_create_from_format('Ymd, G:i', rwmb_meta('ctdn_event_end_datetime'));
                                        
                                        // Datetime for displaying months
                                        $globalMonth = $currentMonth;
                                        
                                        // Start and end date are the same
    									if (empty($end) || $start->format('Ymd') == $end->format('Ymd')) 
    									{
                                            $datetime = strftime('%a, %d. %b', $start->getTimestamp());
                                            $end = $start;
                                        }
                                        // Start and end date are different
                                        else 
                                        {
                                            // Same month
                                            if($start->format('Ym') == $end->format('Ym'))
                                            {
                                                $datetime = strftime('%a, %d.', $start->getTimestamp()).' - '.strftime('%a, %d. %b', $end->getTimestamp());
                                            }
                                            // Different month
                                            else
                                            {
                                                $datetime = strftime('%a, %d. %b', $start->getTimestamp()).' - '.strftime('%a, %d. %b', $end->getTimestamp());
                                            }
                                        }
                                        
                                        if($end->getTimestamp() < time())
                                        {
                                            $eventIsOver = true;
                                        }
                                        
                                        $currentMonth = strftime('%m', $start->getTimestamp());
                                        
                                        if($globalMonth != $currentMonth)
                                        {
                                          echo '<div class="month-changing"><span>'.strftime('%B', $start->getTimestamp()).'</span></div>';   
                                        }
                                        
                                        include (get_template_directory().'/card-events.php');
                                        
                                        $eventIsOver = false;
                                    }
                                    wp_reset_postdata();
                                }
                                else 
                                { 
                                    echo 'Momentan sind keine Events geplant.';
                                }
                            ?>
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
				    <a href="<?php echo esc_url( home_url( '/' ) ).'events-termine/kalender'; ?>" target="_blank" class="btn btn-default" role="button">zum Online-Kalender</a>
				</div>
			</div>	
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>