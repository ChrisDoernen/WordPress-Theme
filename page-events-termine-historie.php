<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-parent-page.php'); ?>
	
	<section id="secGroups" class="section section--less-margin background-white">
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
                                    'order' => 'ASC',
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
    							    $globalYear;
    							    
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
                                        
                                        // Datetime for displaying months
                                        $globalYear = $currentYear;
                                        
                                        $date = date_create();
                                        $start = rwmb_meta('aa_event_start_datetime');
                                        $end = rwmb_meta('aa_event_end_datetime');
                                        
                                        $currentYear = strftime('%Y', $start);
                                        
                                        if($globalYear != $currentYear)
                                        {
                                          echo '<div class="month-changing"><span>'.strftime('%Y', $start).'</span></div>';   
                                        }
                                        
                                        ?>
                                        <div class="card-events">
                                            <div class="row>">
                                            <div class="col-sm-4 col-sm-offset-2 ">
                                                <?php if($url != "") {?>
                                                    <a href="<?php echo $link; ?>" >
                                                        <img class="img-responsive" src="<?php echo $url; ?>"></img>
                                                    </a>
                                                <?php }?>
                                        	</div>
                                        	</div>
                                        </div>
                                        
                                        <?php
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
				    <a href="<?php echo esc_url( home_url( '/' ) ).'kalender'; ?>" target="_blank" class="btn btn-default" role="button">zum Online-Kalender</a>
				</div>
			</div>	
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
	
    </div>
</body>