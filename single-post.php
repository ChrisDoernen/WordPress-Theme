<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>

</head>

<body>
	<div class="site-container">
    
    <?php include (get_template_directory().'/navigation.php'); ?>
    <?php include (get_template_directory().'/header-sub-page.php'); ?>
    
    <section id="content" class="post section section--less-margin background-white diagonal-top diagonal-bottom">
		<div class="container">
			<div class="row">
                <div class=" col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
	                <div class="row">
                		<div class="col-xs-12">
							<div class="post__meta ">
							    <?php $categories = get_the_category(); if (!empty($categories)) {?>
                                    <span class="meta-info post__meta--darker-color">
                                        <a href="<?php echo get_category_link( $categories[0]->cat_ID ) ?>">
                                            <?php echo esc_html( $categories[0]->name );?>
                                        </a>
                                    </span>/
                                <?php }?>
                                <span class="meta-info">
                                    <?php echo do_shortcode('[jmliker]'); ?>
                                </span>/
								<span class="meta-info">
								    <?php echo get_the_date();?> 
								</span>/
    							<span class="meta-info">
    								von <?php echo the_author_meta('display_name', $authorId); ?>
    							</span>
							</div>
						</div>
	                </div>
                	<div class="row">
                		<div class="col-xs-12">
							<div class="">
								 <h1 class='left'><?php echo get_the_title();?></h1>
								 <h2 ><?php echo rwmb_meta('ctdn_SubTitle'); ?></h2>
							</div>
						</div>
	                </div>
					<div class="row">
						<div class="col-xs-12 post__content">
							<?php
								$post = get_post($siteId);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
							?>
						</div>
					</div>
					<div class="row">
    					<div class="col-xs-12">
                            <h6 class="">
                                Über den Autor 
                            </h6>
                        </div>
						<div class="col-xs-4 col-ms-3 col-sm-2">
							<div class="post__author-avatar height-source">
							    <?php echo get_wp_user_avatar($authorId, 'thumbnail', '', get_the_author()); ?>
							</div>
						</div>
						<div class="col-xs-6 col-ms-7 col-sm-8 ">
							<div class="">
								<div class="post__author-bio height-target">
									<?php $authorDesc = the_author_meta('description', $authorId); echo $authorDesc; ?>
								</div>
							</div>
						</div>
    				</div>
    				<div class="row">
    				    <div class="col-xs-12">
                            <?php echo do_shortcode('[shariff]')?>
                        </div>
    				</div>
				</div>
			</div>
		</div>
	</section>				

	<section id='' class='background-grey centered section- diagonal-top'>
	    <div class='container container-ms'>
	    	<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					
					<div class="row">
						<div class="col-xs-12">
							<h6 class="pageHeading textCentered">
								Weitere Beiträge
							</h6>
						</div>
					</div>
	        		<div class="row">
						<?php
							$ppp = $numberContentCards;
							$anz = 0;
							
							$related_posts = rwmb_meta ( 'ctdn_related_posts' );
							
							if (!empty ($related_posts)) 
							{
								$anz = count ($related_posts);
								if ($anz == 3 && $ppp == 2)
								{
								    array_pop($related_posts);
								    $anz = count ($related_posts);
								}
								
								$ppp = $numberContentCards - $anz;
								
								$post_in = array();
								
								foreach ( $related_posts as $key => $value ) 
								{
									$postId = get_id_by_slug ( $value, 'post' );	
									$post_in[$key] = $postId;
								}
								
								$argu = array (
									'post_type' => 'post',
									'post__in' => $post_in,
									'orderby' => 'post__in',
								);
								
								// The Query
								$the_query1 = new WP_Query ( $argu );
			
								// The Loop
								if ( $the_query1->have_posts() ) {
									while ( $the_query1->have_posts() ) {
										$the_query1->the_post();
										include (get_template_directory()."/card-posts.php");
									}
								
								// Restore original Post Data 
								wp_reset_postdata();
								
								} else {
									echo "nichts"; // no posts found
								}
								
							} //Ende if !empty related posts
		
		    				
			    			$post_in[$anz] = $siteId;
		    				
 				            if ($ppp > 0){
    							$argu = array (
    								'post_type' => 'post',
    								'category_name' => $cat_slug,
    								'posts_per_page' => $ppp,
    								'post__not_in' => $post_in,
    								'order' => 'ASC',
    							);
    							
    							// The Query
    							$the_query = new WP_Query ( $argu );
    		
    							// The Loop
    							if ( $the_query->have_posts() ) {
    								while ( $the_query->have_posts() ) {
    									$the_query->the_post();
    									include (get_template_directory()."/card-posts.php");
    								}
    							
    							// Restore original Post Data 
    							wp_reset_postdata();
    							
    							} else {
    								echo "keine weiteren Beiträge gefunden"; // no posts found
    							}
 				            }
						?>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo home_url();?>/news-blog" class="btn btn-default" role="button">zurück zum Blog</a>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>
	
	<?php include (get_template_directory().'/footer.php'); ?> 
    
    </div>
</body>