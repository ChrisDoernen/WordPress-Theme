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
                                    'meta_key'=> 'aa_event_end_datetime',
                                    'order' => 'ASC',
                                    'meta_value' => strtotime("-2 week"),
                                    'meta_compare' => '>',
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'Werbekanäle',
                                        'field' => 'slug',
                                        'terms' => 'homepage-news-and-events',
                                        ),
                                    )
                                );
                                
    							$the_query = new WP_Query ($argu);
    							if ($the_query->have_posts())
    							{
    							    $globalMonth;
    							    
    								while ($the_query->have_posts()) 
    								{
                                        //$currentMonth = null;
                                        $the_query->the_post();
                                        $link = get_permalink();
                                        
                                        $args = array('size' => 'medium','type' => 'image');
                                        $images = rwmb_meta('aa_event_gx', $args);
                                        reset($images);
                                        $firstKey = key($images);
                                        $url = $images[$firstKey]['url'];
                                        $title = get_the_title();
                                        
                                        $date = date_create();
                                        $start = rwmb_meta('aa_event_start_datetime');
                                        $end = rwmb_meta('aa_event_end_datetime');
                                        
                                        // Datetime for displaying months
                                        $globalMonth = $currentMonth;
                                        
                                        // Start and end date are the same
    									if (empty($end) || date('Ymd', $start) == date('Ymd', $end)) 
    									{
                                            $datetime = strftime('%a, %d. %b', $start);
                                            $end = $start;
                                        }
                                        // Start and end date are different
                                        else 
                                        {
                                            // Same month
                                            if(date('Ym', $start) == date('Ym', $end))
                                            {
                                                $datetime = strftime('%a, %d.', $start).' - '.strftime('%a, %d. %b', $end);
                                            }
                                            // Different month
                                            else
                                            {
                                                $datetime = strftime('%a, %d. %b', $start).' - '.strftime('%a, %d. %b', $end);
                                            }
                                        }
                                        
                                        if($end < time())
                                        {
                                            $eventIsOver = true;
                                        }
                                        
                                        $currentMonth = strftime('%m', $start);
                                        
                                        if($globalMonth != $currentMonth)
                                        {
                                          echo '<div class="month-changing"><span>'.strftime('%B', $start).'</span></div>';   
                                        }
                                        
                                        include (get_template_directory().'/card-events.php');
                                        
                                        $eventIsOver = false;
                                    }
                                    wp_reset_postdata();
                                }
                                else 
                                { 
                                    echo '<div class="textCentered">Momentan sind keine Events geplant.</div>';
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
				    <a href="<?php echo esc_url( home_url( '/' ) ).'kalender'; ?>" target="_blank" class="btn btn-default" role="button">zum Online-Kalender</a>
				</div>
			</div>	
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>