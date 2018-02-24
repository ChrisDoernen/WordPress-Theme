<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
	
	<?php include (get_template_directory().'/navigation.php'); ?>
	<?php include (get_template_directory().'/header-parent-page.php'); ?>

    <section id="intro" class="section--less-margin background-grey ">
		<div class="container container-ms">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 ">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 centered">
							<?php
								$post = get_post($pageId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-xs-12">
				    <div class="row">
				        <div class="col-xs-8">
                            <h2 class="section__heading section__heading--no-margin blog-category">Neueste Beiträge</h2>
                        </div>
                    </div>
					<div class="row ">
						<?php
						
    						$argu = array(
    							'post_type' => 'post',
    							'order' => 'DESC',
    							'posts_per_page' => $numberOfPosts,
    						);
    						
    						// The Query
    						$the_query = new WP_Query( $argu );
    
    						// The Loop
    						if ( $the_query->have_posts() ) {
    							while ( $the_query->have_posts() ) {
    								$the_query->the_post();
    								include (get_template_directory()."/card-posts.php");
    							}
    						
    						// Restore original Post Data 
    						wp_reset_postdata();
    						
    						} else {
    							echo "nichts"; // no posts found
    						}
    					?>
						
					</div>
					
					<?php 
					    $args = array(
					        'hide_empty' => 0,
					        'orderby' => 'id',
					        'order' => 'ASC',
					    );
					       
						$categories = get_categories( $args );
						// Kategorien mit IDs
						// Allgemein 1
						// Glaube persönlich: 3
						// Bau-News: 4
						// Kirche und Glaube: 7
						
						$keys = [7,4,5,1];
						
						$categoriesRearranged = array_combine( $keys, $categories );
						ksort($categoriesRearranged);
						
						foreach ($categoriesRearranged as $value) {
							
							echo '
							<div class="row">
								<div class="col-xs-12 ">
									<h2 class="section__heading blog-category">'.$value->name.'</h2>
									    <div class="pull-right blogShowAll">
										<a href="';
                							echo esc_url( home_url( '/' ) ).$value->slug;			
                							echo '"><span class=hidden-xs hidden-ms">alle anzeigen</span><i class="fa fa-th"></i>
                						</a>
									</div>
								</div>
							</div>
							<div class="row masonry">
							';
							
							$argu = array(
    							'post_type' => 'post',
    							'category_name' => $value->slug,
    							'order' => 'DESC',
    							'posts_per_page' => $numberOfPosts,
    						);
    						
    						$the_query = new WP_Query($argu);
    
    						if ($the_query->have_posts()) 
    						{
    							while ( $the_query->have_posts()) 
    							{
    								$the_query->the_post();
    								include (get_template_directory()."/card-posts.php");
    							}
    						
    						// Restore original Post Data 
    						wp_reset_postdata();
    						
    						} 
    						else 
    						{
    							echo "Es sind noch keine Beiträge vorhanden."; // no posts found
    						}
    						
    						echo '</div>';
						} //Ende foreach
					?>
				</div>
			</div>
		</div>
	</section>

	<?php include (get_template_directory().'/footer.php'); ?> 
 
    </div>

</body>